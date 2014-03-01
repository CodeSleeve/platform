/**
 * this will send the csrf token headers on every ajax request
 * made via jquery...
 */
$(function()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

/**
 * Initialize plugins
 */
$(function()
{
    $('.chosen').chosen();
    $('.datepicker').datepicker({
    	changeMonth: true,
      	changeYear: true,
    	dateFormat: 'yy-mm-dd'
    });

    if (typeof CKEDITOR !== 'undefined')
    {
        CKEDITOR.basePath = "/assets/ckeditor/";
    }

    // Initialize Ckeditor
    var data = $('textarea.content');

    $.each(data, function(key, value)
    {
        CKEDITOR.replace(value, {
            language: 'en',
            //filebrowserBrowseUrl: '/admin/assets',                    //url to browse uploaded files
            //filebrowserUploadUrl: '/admin/assets',                    //url for the script to upload new files
            filebrowserImageBrowseUrl: '/admin/photos',                 //url to browse upoaded photos
            filebrowserImageUploadUrl: '/admin/photos'                  //url for the script to upload new photos
        });

    });
});

/**
 * Restfulize any hyperlinks that contain a data-method attribute by
 * creating a mini form with the specified method and adding a trigger
 * within the link.
 *
 * Ex:
 *     <a href="post/1" data-method="delete">destroy</a>
 *     // Will trigger the route Route::delete('post/(:id)')
 *
 */
$(function()
{
    $('[data-method]').append(function(){
        return "\n"+
        "<form action='"+$(this).attr('href')+"' method='POST' style='display:none'>\n"+
        "   <input type='hidden' name='_token' value='"+$('meta[name="csrf-token"]').attr('content')+"'>\n"+
        "   <input type='hidden' name='_method' value='"+$(this).attr('data-method')+"'>\n"+
        "</form>\n"
    })
    .removeAttr('href')
    .attr('style','cursor:pointer;')
    .on('click', function() {
    	var self = $(this);

    	bootbox.confirm('Are you sure you wish to remove this record?', function(confirmed) {
			if (confirmed) {
				self.find('form').submit();
			}
        });
    });
});