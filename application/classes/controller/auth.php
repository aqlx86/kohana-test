<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Secure {
	
	public function action_create()
	{
		if(! empty($_POST))
		{
			$user = new Model_User;
			
			$user->values($_POST, array('username','password','email'));
			
			$roles = Arr::get($_POST, 'roles');
			
			try 
			{
				$user->save();
				
				$user->add('roles', $roles);
			} 
			catch (ORM_Validation_Exception $e) 
			{
				$this->view->_errors = $e->errors('');
			}
		}
		
	}
	
	public function action_login()
	{
		if(! empty($_POST))
		{
			
			$username = Arr::get($_POST, 'username');
			$password = Arr::get($_POST, 'password');
			
			if(Auth::instance()->login($username, $password))
			{
				$this->request->current()->redirect('/');
				
				return;
			}
			
			$this->view->_errors = array('error' => 'invalid username or password');
		}
	}
	
	public function action_logout()
	{
		Auth::instance()->logout(TRUE);
		
		$this->request->current()->redirect('auth/login');
	}
	
}