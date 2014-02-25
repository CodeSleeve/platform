<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form-horizontal span12']) ?>
	
	<div class="form-group ">
		<label for="title">Title</label>
		<?= Form::text('title', $menuLink->title, ['class' => 'form-control']) ?>
		<?= show_message_when('title', $errors) ?>
	</div>
	
	<div class="form-group ">
		<label for="page_id">Page</label>
		<?= Form::select('page_id', $menuLink->available_pages, $menuLink->page_id, ['class' => 'form-control']) ?>
		<?= show_message_when('page_id', $errors) ?>
	</div>

	<div class="form-group ">
		<label for="url">URL (if you specify a url here it will override the page you selected)</label>
		<?= Form::text('url', $menuLink->url, ['class' => 'form-control']) ?>
		<?= show_message_when('url', $errors) ?>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		or <a href="<?= $cancel ?>">Cancel</a>
	</div>
<?= Form::close() ?>