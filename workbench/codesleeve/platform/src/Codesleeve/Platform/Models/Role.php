<?php namespace Codesleeve\Platform\Models;

class Role extends \Eloquent 
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'platform_roles';

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	 * A role belongs to many users
	 * 
	 * @return belongsToMany 
	 */
    public function users()
    {
        return $this->belongsToMany('Codesleeve\Platform\Models\User', 'platform_roles_users');
    }
}

