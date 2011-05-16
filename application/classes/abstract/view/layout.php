<?php defined('SYSPATH') or die('No direct script access.');

class Abstract_View_Layout extends Abstract_View_Base {
	
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