<?php defined('SYSPATH') or die('No direct script access.');

class View_Page extends View_Layout {
	
	public $_user;
	
	public function _initialize()
	{
		Assets::add_group('default-template');
	
		parent::_initialize();
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
