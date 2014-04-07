<?php namespace Bbdo\YmlTranslator;

use Illuminate\Filesystem\Filesystem;

class YmlLoader implements \Illuminate\Translation\LoaderInterface {

	/**
	 * The filesystem instance.
	 *
	 * @var \Illuminate\Filesystem\Filesystem
	 */
	protected $files;

	/**
	 * The default path for the loader.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * All of the namespace hints.
	 *
	 * @var array
	 */
	protected $hints = array();

	/**
	 * Create a new file loader instance.
	 *
	 * @param  \Illuminate\Filesystem\Filesystem  $files
	 * @param  string  $path
	 * @return void
	 */
	public function __construct(Filesystem $files, $path)
	{
		$this->path = $path;
		$this->files = $files;
	}

	/**
	 * Load the messages for the given locale.
	 *
	 * @param  string  $locale
	 * @param  string  $group
	 * @param  string  $namespace
	 * @return array
	 */
	public function load($locale, $group, $namespace = null)
	{
		if (is_null($namespace) || $namespace == '*')
		{ 			
			return $this->loadPath($this->path, $locale, $group);
		}
		else
		{
			// namespace yml not implemented 
			return "";
		}
	}


	/**
	 * Load a locale from a given path.
	 *
	 * @param  string  $path
	 * @param  string  $locale
	 * @param  string  $group
	 * @return array
	 */
	protected function loadPath($path, $locale, $group)
	{
		if ($this->files->exists($full = "{$path}/{$locale}/{$group}.yml"))
		{
			\Yaml::setFile($full);
			return \Yaml::parsing();
		}

		return array();
	}

	/**
	 * Add a new namespace to the loader.
	 *
	 * @param  string  $namespace
	 * @param  string  $hint
	 * @return void
	 */
	public function addNamespace($namespace, $hint)
	{
		$this->hints[$namespace] = $hint;
	}

}