<?php defined('SYSPATH') or die('No direct script access.');

class View_Page_Post_Index extends View_Page {
	
	public $title = 'Post';

	public function _initialize()
	{
		parent::_initialize();
		
		Assets::add_group('post-template');
	}
}