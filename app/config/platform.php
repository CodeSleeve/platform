<?php return [

	'navigation' =>
	[
		[
			'title' => 'Dashboard',
			'icon' => 'fa-dashboard',
			'url' => action('Platform\HomeController@dashboard'),
			'shown' => can('view', 'Dashboard'),
			'active' => active('Platform\HomeController'),
		],
		[
			'title' => 'Roles',
			'icon' => 'fa-eye',
			'url' => action('Platform\RoleController@index'),
			'shown' => can('update', 'Role'),
			'active' => active('Platform\RoleController'),
		],
		[
			'title' => 'Users',
			'icon' => 'fa-users',
			'url' => action('Platform\UserController@index'),
			'shown' => can('update', 'User'),
			'active' => active('Platform\UserController'),
		],
	],
];