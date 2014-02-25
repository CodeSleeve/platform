<?php namespace Codesleeve\Platform\Models;

use Hash, Eloquent;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'platform_users';

	/**
	 * Attributes that can be mass assigned on this model.
	 * 
	 * @var array
	 */
	protected $fillable = ['first_name', 'last_name', 'email'];

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
        return $this->belongsToMany('Codesleeve\Platform\Models\Role', 'platform_roles_users');
    }

    /**
     * Eloquent mutator method, insures that passwords are hashed.
     * 
     * @param string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}