<?= Form::open(['url' => $action, 'method' => $method]) ?>
	
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" value="<?= $page->title ?>">
		<?= show_message_when('title', $errors) ?>
	</div>

	<div class="form-group">
		<label for="slug">Slug</label>
		<span>/ pages /</span>
		<input type="text" name="slug" class="form-control" value="<?= $page->slug ?>">
		<?= show_message_when('slug', $errors) ?>
	</div>
	
	<div class="form-group">
		<label class="checkbox">
			<?= Form::checkbox('home_page', '1', $page->home_page) ?>
			Set as Homepage
		</label>
	</div>

	<div class="form-group ">
		<label for="content">Content</label>
		<?= Form::textarea('content', $page->content, ['class' => 'content form-control']); ?>
		<?= show_message_when('content', $errors) ?>
	</div>

	<div class="actions">
		<?= Form::submit('Save', array('class' => 'btn btn-primary')); ?>

		or <a href="<?= $cancel ?>">Cancel</a>
	</div>
<?= Form::close(); ?>