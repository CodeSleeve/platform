'use strict'

/**
 * This namespace our application object
 */
var app = {};

$(document).ready(function() {

	// Initialize Ckeditor
	var data = $('textarea.content');
	$.each(data, function(key, value)
	{
		CKEDITOR.replace(value, {
			language: 'en',
			//filebrowserBrowseUrl: '/admin/assets',					//url to browse uploaded files
			//filebrowserUploadUrl: '/admin/assets',					//url for the script to upload new files
			filebrowserImageBrowseUrl: '/admin/photos',					//url to browse upoaded photos
			filebrowserImageUploadUrl: '/admin/photos'					//url for the script to upload new photos
		});

	});
});
	