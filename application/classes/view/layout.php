<?php defined('SYSPATH') or die('No direct script access.');

class View_Layout extends Kostache_Layout {
	
	protected $_layout = 'layout/default';
	
	protected $_partials = array(
		'footer' => 'layout/footer'
	);
	
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
