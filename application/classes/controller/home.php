<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Abstract_Controller_Website {
	
	public function action_index()
	{
		Notices::success('Congratulations! You did it!');
	}
	
}