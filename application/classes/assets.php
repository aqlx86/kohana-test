<?php defined('SYSPATH') or die('No direct script access.');

class Assets
{
	/**
	 * Group of requested assets
	 */
	protected static $requested = array();

	public static function add_group($name)
	{
		if (is_array($name))
		{
			foreach ($name as $n)
			{
				// Key to remove duplicates, value for simplicity
				self::$requested[$n] = $n;
			}
		}
		else
		{
			// Key to remove duplicates, value for simplicity
			self::$requested[$name] = $name;
		}
	}

	public static function get($section = NULL)
	{
		$assets = array();

		foreach (self::$requested as $name)
		{
			if (($group = Kohana::config('assets.'.$name)) !== NULL)
			{
				foreach ($group as $asset)
				{
					if ($asset[2] === $section)
					{
						$assets[] = $asset;
					}
				}
			}
			else
			{
				// Log a warning
				Kohana::$log->add(Kohana::INFO, 'Could not find assets group `'.$name.'`');
			}
		}

		// Sort the assets
		usort($assets, 'Assets::sort_assets');

		$array = array();
		foreach ($assets as $asset)
		{
			if ($asset[0] == 'script')
			{
				$array[] = HTML::script($asset[1]);
			}
			elseif ($asset[0] == 'style')
			{
				$array[] = HTML::style($asset[1]);
			}
		}

		return $array;
	}

	/**
	 * Custom sorting method for assets based on 'weight' key
	 */
	public static function sort_assets($a, $b)
	{
		( ! isset($a[3])) AND $a[3] = 0;
		( ! isset($b[3])) AND $b[3] = 0;

		if ($a[3] == $b[3]) {
			return 0;
		}

		return ($a[3] - $b[3]);
	}
}
