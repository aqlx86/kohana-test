<?php defined('SYSPATH') or die('No direct script access.');

return array
(
	'default-template' => array
	(
//		array('script', 'media/js/test.js', 'head'),
		array('script', 'media/js/script.js', 'head'),		
		array('style', 'media/css/screen.css', 'head'),
		
		//array('style', 'media/ko/css/compiled/styles-'.Kohana::APP_VERSION.'.css', 'head'),
		//array('script', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js', 'head'),
		//array('script', 'media/js/notices.js', 'head'),
		//array('script', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js', 'body', 10),
	),
	'post-template' => array(
		array('style', 'media/css/post.css', 'head')
	)
);
