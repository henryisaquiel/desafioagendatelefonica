<?php
namespace App\Controllers;

use \App\Controllers\BaseController;

/**
* 
*/
class IndexController extends BaseController
{
	
	public static function index()
	{
		return \App\Views\ApplicationView::render('index');
	}
}