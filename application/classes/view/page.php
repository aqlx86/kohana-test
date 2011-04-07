<?php defined('SYSPATH') or die('No direct script access.');

class View_Page extends View_Layout {
	
	public  $_errors = array();
	
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
	
	public function errors()
	{
		$e = array();
		
		foreach($this->_errors as $key => $error)
		{
			$e[] = array(
				'field' => $key, 'message' => $error
			);
		}
		
		if(count($e) < 1)
			return;
		
		return array('messages' => $e);
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
