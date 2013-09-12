<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The model's validation rules.
	 * 
	 * @var array
	 */
    public static $rules = [
    	'first_name' 		=> 'required|max:256',
    	'last_name' 		=> 'required|max:256',
    	'email' 			=> 'required|email',
    	'confirm_password' 	=> 'required_with:password|same:password'
    ];

	/**
	 * Attributes that can be mass assigned on this model.
	 * 
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded = ['password'];

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Determine if a user has a given role
	 * 
	 * @param  string  $key 
	 * @return boolean
	 */
    public function hasRole($key) 
    {
        foreach($this->roles as $role)
        {
            if($role->name === $key)
            {
                return true;
            }
        }

        return false;
    }

    /**
     * A user belongs to many roles
     * 
     * @return belongsToMany
     */
    public function roles() 
    {
        return $this->belongsToMany('Role', 'roles_users');
    }

    /**
     * A user has many permissions.
     * 
     * @return hasMany
     */
    public function permissions() 
    {
        return $this->hasMany('Permission');
    }

}