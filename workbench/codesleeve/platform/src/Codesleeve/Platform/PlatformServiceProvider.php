<?php namespace Codesleeve\Platform;

use ClassLoader;
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
		$base = __DIR__ . "/../..";

		$this->package('codesleeve/platform');

		$this->configureAssetPipeline($base);

		require "{$base}/filters.php";
		require "{$base}/macros.php";
		require "{$base}/routes.php";
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$base = __DIR__ . "/../..";

		$this->app->register('Codesleeve\AssetPipeline\AssetPipelineServiceProvider');
 		$this->app->register('Codesleeve\Stapler\StaplerServiceProvider');
 		$this->app->register('Authority\AuthorityL4\AuthorityL4ServiceProvider');

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
	 * Tweak the configuration for asset pipeline for this application
	 * so we can use assets inside of the directory
	 * 
	 * 		workbench\codesleeve\platform\src\assets
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

		$config['paths'][] = str_replace($config['base_path'].'/', '', realpath($base . "/assets/javascripts"));
		$config['paths'][] = str_replace($config['base_path'] .'/', '', realpath($base . "/assets/stylesheets"));
		$config['paths'][] = str_replace($config['base_path'] .'/', '', realpath($base . "/assets/vendors"));

		$asset->setConfig($config);
	}
}