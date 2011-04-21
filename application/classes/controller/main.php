<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Base {
	
	public function before()
	{
		if(! Auth::instance()->logged_in())
		{
			$this->request->current()->redirect('auth/login');
			
			return;
		}
		
		parent::before();
		
		$this->view->_user = Auth::instance()->get_user();
	}
	
}
