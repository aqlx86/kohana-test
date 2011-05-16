<?php defined('SYSPATH') or die('No direct script access.');

Class Abstract_View_Base extends Kostache_Layout {
	
	public function base_url()
	{
		return URL::base(TRUE);
	}
	
}