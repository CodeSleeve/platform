"use strict";

// @depends on vendors/bootbox/bootbox.min.js

/**
 * This binds an on click event to form submit buttons (contained within a form) that have 
 * wherever the form is pointing to (should likely be a delete url).
 * This uses a directive based programming approach where you can reuse the same removable settings over and over
 *
 * 2 REQUIREMENTS to use this directive
 *	- should be the submit button of a form
 *	- put data-removable="record_type" in as an attribute on the deletion form submit button 
 *	  (the record type let's the bootbox confirm the record type in the confirm message)
 *
 *  <code>
 *    <form method="POST" action="resource/patch">
 *    	<input type="hidden" name="_method" value="DELETE">
 *     	<button type="submit" data-removable="record">Delete Record</button>
 *    </form>
 *  </code>
 */
(function($) {
	$(document).ready(function() {

		app.removeRecord = function(event) {
	        event.preventDefault();
	        var self = $(this);
	        var recordType = self.attr('data-removable');

	        bootbox.confirm('Are you sure you wish to remove this ' + recordType + ' ?', function(confirmed) {
				if (confirmed) {
					self.closest('form').submit();
				}
	        });
		}
		
		if (bootbox.confirm) {
			$('[data-removable]').on('click', app.removeRecord); 		
		}

	});
})(jQuery);