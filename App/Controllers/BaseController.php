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
		$request_path = $_SERVER['REQUEST_URI'];
		$script_name = dirname($_SERVER['SCRIPT_NAME']);

		$encontra = strpos($request_path, $script_name);
		if( $encontra === 0) {
			$request_path = '/' . ltrim(substr($request_path, strlen($script_name), strlen($request_path)), '/');
		}

		if($request_path === '/'){
			return IndexController::index();
		}

		$request_uri = array_filter(explode('/', $request_path));

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