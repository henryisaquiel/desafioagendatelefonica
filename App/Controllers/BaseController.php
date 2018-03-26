<?php
namespace App\Controllers;

/**
* 
*/
class BaseController
{
	
	function __construct(){}

	public static function init()
	{
		if($_SERVER['REQUEST_URI'] === '/'){
			return IndexController::index();
		}

		$request_uri = array_filter(explode('/', $_SERVER['REQUEST_URI']));

		$path = function ($request_uri){
			$request_uri;
		};

		if(array_shift($request_uri) == 'ws'){
			$call_class = __NAMESPACE__ .'\\' .ucfirst(array_shift($request_uri)).'Controller';
			$call_method = array_shift($request_uri);

			if(method_exists($call_class, $call_method)){
				$classLoad = new $call_class;
				return $classLoad->{$call_method}($request_uri);
			} else {
				throw new \Exception('Metodo chamado não existe.');
			}
		}
	}

	protected function jsonReturn(array $data, $http_status_code = 200)
	{
		header('Content-Type: application/json', TRUE, $http_status_code);
		echo json_encode($data);
		return true;
	}

	protected function postRequest()
	{
		return array_filter($_POST);
	}
}