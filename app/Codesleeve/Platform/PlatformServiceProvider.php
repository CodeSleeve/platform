<?php namespace Codesleeve\Platform;

use ClassLoader, View;
use Illuminate\Support\ServiceProvider;

class PlatformServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$base = __DIR__;

		$this->configureAssetPipeline($base);
		$this->registerMacros($base);
		$this->registerViews($base);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['platform.setup'] = $this->app->share(function($app)
        {
            return new Commands\PlatformSetupCommand;
        });

		$this->commands('platform.setup');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	/**
	 * Register view namespaces for platform
	 *
	 * @param  string $base
	 * @return void
	 */
	protected function registerViews($base)
	{
		View::addNamespace('platform', $base . '/Views');
	}

	/**
	 * Tweak the configuration for asset pipeline for this application
	 * so we can use assets inside of the directory
	 *
	 * 		app\Codesleeve\Platform\Assets
	 *
	 * We do this 'namespacing' so we don't clutter up our
	 * main app/assets directory with assets that belongs
	 * to codesleeve\platform.
	 *
	 * @param  string $base
	 * @return void
	 */
	protected function configureAssetPipeline($base)
	{
		$asset = $this->app->make('asset');
		$config = $asset->getConfig();

		$config['paths'][] = str_replace($config['base_path'].'/', '', realpath($base . "/Assets/javascripts"));
		$config['paths'][] = str_replace($config['base_path'] .'/', '', realpath($base . "/Assets/stylesheets"));
		$config['paths'][] = str_replace($config['base_path'] .'/', '', realpath($base . "/Assets/vendors"));

		$asset->setConfig($config);
	}

	/**
	 * Register macros within the Codesleeve\Platform\Macros folder
	 *
	 * @param  string $base
	 * @return void
	 */
	protected function registerMacros($base)
	{
		require $base . "/Macros/active.php";
		require $base . "/Macros/can.php";
		require $base . "/Macros/render.php";
		require $base . "/Macros/show_message_when.php";
		require $base . "/Macros/viewpath.php";
		require $base . "/Macros/sort_table_by.php";
	}
}