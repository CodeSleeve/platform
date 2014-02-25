<h3>
	<i class="fa fa-edit"></i>
	Editing Page
</h3>

<?= render("{$viewpath}::pages._form", [
	'page' => $page, 
	'action' => action("{$namespace}\PageController@update", [$page->id]),
	'method' => 'PUT',
	'cancel' => action("{$namespace}\PageController@index"),
]) ?>