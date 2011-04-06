<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Form extends Controller_Main {

	public function action_index()
	{
		if(! empty($_POST))
		{
			$posts = arr::get($_POST, 'form', array());
		}
	}
}
