<?php

HTML::macro('deleteLink', function($url, $text = 'Delete', $attributes = [], $type = 'record')
{
	if (!$attributes) {
		$attributes = ['class' => 'btn btn-danger delete-link'];
	}
	$attributes['data-removable'] = $type;

	return Form::open(['url' => $url, 'method' => 'DELETE', 'style' => 'display: inline']) .
		   Form::token() .
		   Form::submit($text, $attributes) .
		   Form::close();
});


HTML::macro('deleteButton', function($url, $text = 'Delete', $attributes = [])
{
	if (!$attributes) {
		$attributes = ['class' => 'btn btn-danger btn-delete'];
	}

	return Form::open(['url' => $url, 'method' => 'DELETE']) .
		   Form::token() .
		   Form::submit($text, $attributes) .
		   Form::close();
});