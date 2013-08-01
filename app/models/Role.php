<?php

class Role extends Eloquent 
{
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

