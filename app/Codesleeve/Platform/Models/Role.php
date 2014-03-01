<?php namespace Codesleeve\Platform\Models;

class Role extends \Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

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
        return $this->belongsToMany('User', 'roles_users');
    }
}

