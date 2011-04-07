<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Post extends Controller_Main {
	
	public function action_index()
	{
		if(! empty($_POST))
		{
			$user_post = arr::get($_POST, 'post', array());
			
			$post = ORM::factory('post')->values($user_post);
			
			try 
			{
				$post->save();
				
				$this->request->redirect('/');
			}
			catch (ORM_Validation_Exception $e)
			{
				$this->view->_errors = $e->errors('models');
			}
		}
	}
}