<?php

return array(

    'initialize' => function($authority) {
    	$user = $authority->getCurrentUser();
    	
        $authority->addAlias('manage', array('create', 'read', 'update', 'delete'));
        $authority->addAlias('moderate', array('read', 'update', 'delete'));

        // admin permissions
        if ($user->hasRole('admin'))
        {
            // The logged in user is a admin, we allow him/her to perform 
            // manage actions (create, read, update, delete) on "all" "Resources".
            $authority->allow('manage', 'all');

            // Prevent the admin from deleting his/her own user account.
            $authority->deny('delete', 'User', function ($self, $theUser)
            {
                return (int)$theUser->id === (int)$self->getCurrentUser()->id;
            });
        }
    }

);
