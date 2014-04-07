<?php namespace Bbdo\YmlTranslator;

use Illuminate\Translation\TranslationServiceProvider;

class YmlTranslatorServiceProvider extends TranslationServiceProvider {

	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerYmlLoader();

		$this->app->bindShared('translator', function($app)
		{
			$loader = $app['translation.loader'];

			// When registering the translator component, we'll need to set the default
			// locale as well as the fallback locale. So, we'll grab the application
			// configuration so we can easily get both of these values from there.
			$locale = $app['config']['app.locale'];

			$trans = new \Illuminate\Translation\Translator($loader, $locale);

			return $trans;
		});
	}

	/**
	 * Register the translation line loader.
	 *
	 * @return void
	 */
	protected function registerYmlLoader()
	{
		$this->app->bindShared('translation.loader', function($app)
		{
			return new YmlLoader($app['files'], $app['path'].'/lang');
		});
	}


}