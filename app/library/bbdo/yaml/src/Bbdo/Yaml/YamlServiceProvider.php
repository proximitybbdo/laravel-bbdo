<?php namespace Bbdo\Yaml;

use Illuminate\Support\ServiceProvider;
use Bbdo\Yaml\Parser;


class YamlServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


    public function boot()
    {
        $this->package('bbdo/yaml');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['yaml'] = $this->app->share(function($app) {

            return new Parser();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('yaml');
	}

}