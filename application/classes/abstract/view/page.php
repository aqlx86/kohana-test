<?php defined('SYSPATH') or die('No direct script access.');

class Abstract_View_Page extends Abstract_View_Layout {
	
	public $title = 'default project template title';
	
	
	public function _initialize()
	{
		Assets::add_group('default-template');
	
		parent::_initialize();
	}
	
	public function assets_body()
	{
		$assets = '';
		
		foreach (Assets::get('body') as $asset)
		{
			$assets .= $asset;
		}

		return $assets;
	}
	
	public function assets_head()
	{
		$assets = '';
		
		foreach (Assets::get('head') as $asset)
		{
			$assets .= $asset."\n";
		}

		return $assets;
	}
	
	public function notices()
	{
		$data = array();

		foreach (Notices::get() as $array)
		{
			$message_path = $array['type'].'.'.$array['key'];
			$data[] = array
			(
				'type'     => $array['type'],
				'key'      => $array['key'],
				'message'  => Kohana::message('notices', $message_path, $message_path),
			);
		}

		return $data;
	}
	
	public function profiler()
	{
		return View::factory('profiler/stats');
	}
	
	public function render()
	{
		$content = parent::render();

		return str_replace(array
		(
			'[[assets_head]]',
			'[[assets_body]]'
		), array
		(
			$this->assets_head(),
			$this->assets_body()
		), $content);
	}
}