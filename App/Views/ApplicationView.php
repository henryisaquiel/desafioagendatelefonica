<?php
namespace App\Views;

/**
* 
*/
class ApplicationView
{
	
	function __construct(){}

	public static function render($file_include)
	{
		$file_include = __DIR__ . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . $file_include . '.php';

		return include($file_include);
	}
}