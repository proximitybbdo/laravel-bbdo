<?php 


// class Translator extends \Illuminate\Translation {

//     /**
// 	 * Load the specified language group.
// 	 *
// 	 * @param  string  $namespace
// 	 * @param  string  $group
// 	 * @param  string  $locale
// 	 * @return void
// 	 */
// 	public function load($namespace, $group, $locale)
// 	{
// 		var_dump("test");
// 		if ($this->isLoaded($namespace, $group, $locale)) return;

// 		// The loader is responsible for returning the array of language lines for the
// 		// given namespace, group, and locale. We'll set the lines in this array of
// 		// lines that have already been loaded so that we can easily access them.
// 		$lines = $this->loader->load($locale, $group, $namespace);

// 		$this->loaded[$namespace][$group][$locale] = $lines;
// 	}

// }

// class YmlTranslationServiceProvider extends TranslationServiceProvider {

// 	public function boot()
//     {
//         App::bind('transator', function()
//         {
//             return new Jonathan\Translation\Translator;
//         });

//         parent::boot();
//     }


// }