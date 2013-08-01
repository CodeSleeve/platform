"use strict";

// @depends on vendors/jeditable/jeditable.min.js

/**
 * This sends jeditable parameters field and value to 
 * wherever the form is pointing to (should likely be a PATCH url)
 * this uses a directive based programming approach where
 * you can reuse the same editable settings over and over
 *
 * 2 REQUIREMENTS to use this directive
 *	- needs a form parent (this is how it knows where to send our stuff)
 *	- put data-editable="field_name" in for any field (so the server knows the field name to send)
 *
 *  <code>
 *    <form method="POST" action="resource/patch">
 *    	<span data-editable="name">My name</span>
 *     	<span data-editable="foobar" data-action="different/resource/patch">My foobar</span>
 *    </form>
 *  </code>
 */
(function($) {
	$(document).ready(function() {

		app.changeField = function(field_value, settings) {

			var element = $(this);
			var field_name = element.data('editable');
			var form_method = element.closest('form').attr('method');
			var form_action = element.closest('form').attr('action');
			
			var override_method = element.data('method');
			var override_action = element.data('action');

			if(typeof override_method !== 'undefined' && override_method.length > 0)
				form_method = override_method;

			if(typeof override_action !== 'undefined' && override_action.length > 0)
				form_action = override_action;

			element.addClass('submitting');

			$.ajax({ 
				url: form_action, 
				method: form_method,
				data: { 'name': field_name, 'value': field_value },
			})

			.done(function(data) {
				if (data === '') {
					data = 'Click to edit';
				}

				element.text(data);
				element.removeClass('submitting');
			})
			
			.fail(function(xhr) {
				var response = xhr.responseText;
				if(response === '') response = 'Click to edit';
				element.text(response);
				element.removeClass('submitting');
			});

			return field_value;
		}

		if($.editable)
		{
			$('[data-editable]').editable(app.changeField, 
			{
				style: 'display: inline'
			});			
		}

	});
})(jQuery);