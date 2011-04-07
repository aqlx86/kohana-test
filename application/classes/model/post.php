<?php defined('SYSPATH') or die('No direct script access.');

class Model_Post extends ORM {
	
	protected $_belongs_to = array(
		'user' => array()
	);
		
	/**
	 * Set post rules
	 * 
	 * @see kohana/Kohana_ORM::rules()
	 */
	public function rules()
	{
		return array(
		'title' => array(
			array('not_empty'),
			array('min_length', array(':value', 3))
		),
		'content' => array(
			array('not_empty'),
			array('min_length', array(':value', 3))
		));
	}
}