<h3>
	<i class="fa fa-plus"></i>
	Creating Page
</h3>

<?= render("{$viewpath}::pages._form", [
	'page' => $page, 
	'action' => action("{$namespace}\PageController@store"),
	'method' => 'POST',
	'cancel' => action("{$namespace}\PageController@index"),
]) ?>