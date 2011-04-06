<?php defined('SYSPATH') or die('No direct script access.');

class Kostache extends Kohana_Kostache
{
	public static function factory($template, array $partials = NULL)
	{
		// Check if the class exists exactly where it's defined
		$file = Kohana::find_file('classes', 'view/'.$template);
		
		if ($file)
		{
			include_once $file;
		}

		$instance = parent::factory($template, $partials);
		
		$instance->_template_path = $template;

		return $instance;
	}

	public function __construct($template = NULL, array $partials = NULL)
	{
		parent::__construct($template, $partials);

		// Allow for some setup to be done
		$this->_initialize();
	}

	/**
	 * Allows for things to be setup in View classes.
	 * Avoids having to extend the constructor and pass around all those parameters.
	 *
	 * @return  void
	 */
	public function _initialize() {}

	public function app_version()
	{
		return Kohana::APP_VERSION;
	}
}
