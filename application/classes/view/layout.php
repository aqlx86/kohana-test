<?php defined('SYSPATH') or die('No direct script access.');

class View_Layout extends Kostache_Layout {
	
	public  $_errors = array();
	
	protected $_layout = 'layout/default';
	
	protected $_partials = array(
		'footer' => 'layout/footer'
	);
	
	public function assets_body()
	{
		$assets = '';
		
		foreach (Assets::get('body') as $asset)
		{
			$assets .= $asset;
		}

		return $assets;
	}
	
	public function assets_head()
	{
		$assets = '';
		
		foreach (Assets::get('head') as $asset)
		{
			$assets .= $asset."\n";
		}

		return $assets;
	}
	
	public function base_url()
	{
		return URL::base(TRUE);
	}
	
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
	
	public function render()
	{
		$this->_partials += array
		(
			'body' => $this->_template_path
		);

		// Make the layout view the child class's template
		$this->_template_path = $this->_layout;

		return parent::render();
	}
}
