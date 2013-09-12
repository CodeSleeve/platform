<link rel="stylesheet" href="<?= asset('vendors/bootstrap/css/bootstrap-cerulean.min.css') ?>"></link>
<link rel="stylesheet" href="<?= asset('vendors/bootstrap/css/bootstrap-responsive.min.css') ?>"></link>


<script type="text/javascript" src="<?= asset('vendors/jquery/jquery-1.9.0.min.js') ?>"></script>
<script type="text/javascript">	  
	$(document).ready(function() {
		// Helper function to get parameters from the query string.
		function getUrlParam(paramName)
		{
			var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
			var match = window.location.search.match(reParam) ;

			return (match && match.length > 1) ? match[1] : '' ;
		}
		
		$('a').click(function(){
			var CKEditorFuncNum = getUrlParam('CKEditorFuncNum');
			var fileUrl = $(this).attr('href');
			window.opener.CKEDITOR.tools.callFunction(CKEditorFuncNum, fileUrl);
			window.close();
		});

	});
</script>
 
<ul class="thumbnails">
	<?php foreach($photos as $photo): ?>
		<li class="span2">
			<a class="thumbnail" href="<?= $photo->photo->url() ?>">
				<img src="<?= $photo->photo->url('thumbnail') ?>" title="Click To Enlarge" />
				<span><?= $photo->photo_file_name ?></span>
			</a>
		</li>
	<?php endforeach; ?>
</ul>