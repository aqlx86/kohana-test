<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller {
	
	/**
	 * @var  boolean  auto render view
	 **/
	public $auto_render = TRUE;
	
	/**
	 * @var object the content View object
	 */
	public $view;
	
	
	public function before()
	{
		if ($this->auto_render === TRUE)
		{
			// Set default title and content views (path only)
			$directory = $this->request->directory();
			$controller = $this->request->controller();
			$action = $this->request->action();

			// Removes leading slash if this is not a subdirectory controller
			$controller_path = trim($directory.'/'.$controller.'/'.$action, '/');

			try
			{
				$this->view = Kostache::factory('page/'.$controller_path);
			}
			catch (Kohana_View_Exception $x)
			{
				/*
				 * The View class could not be found, so the controller action is
				 * repsonsible for making sure this is resolved.
				 */
				$this->view = NULL;
			}
		}
	}
	
	public function after()
	{
		if($this->auto_render === TRUE)
		{
			// If content is NULL, then there is no View to render
			if ($this->view === NULL)
				throw new Kohana_View_Exception('There was no View created for this request.');

			$this->response->body($this->view);
		}
	}
	
}