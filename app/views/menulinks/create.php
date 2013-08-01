<h3>Creating Menulink</h3>

<?= View::make('menulinks._form', ['menulink' => $menulink, 'action' => action('MenuLinksController@store', [$menu->id]), 'method' => 'POST']) ?>