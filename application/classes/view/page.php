<?php defined('SYSPATH') or die('No direct script access.');

class View_Page extends View_Layout {
	
	public  $_errors = array();
	
	
	
	
	
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
	
	
	
}
