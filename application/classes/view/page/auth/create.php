<?php defined('SYSPATH') or die('No direct script access.');

class View_Page_Auth_Create extends View_Page {
	
	protected $_layout = 'layout/auth';

	public function roles()
	{
		return ORM::factory('role')->find_all();
	}
	
}