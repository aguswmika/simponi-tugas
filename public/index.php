<?php
// warning
// experimental, jangan diedit
// hanya orang expert yang boleh edit

// error_reporting(0);
// ini_set('display_errors', 'Off');

session_start();
DEFINE('BASE_PATH', __DIR__ . '/../');
date_default_timezone_set("Asia/Makassar");

require_once BASE_PATH.'app/init.php';

if(strtolower($_SERVER['REQUEST_METHOD']) === 'post'){
    foreach ($_POST as $key => $value){
        Session::flash('old_'.$key, $value);
    }
}

require_once BASE_PATH.'app/router.php';
$urls = trim(filter_var(str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['PHP_SELF']), FILTER_SANITIZE_URL), "/");

if(empty($urls)){
	$route_check = $routes['default'];
	if(is_string($route_check)){
		$class = explode('@', $route_check);

		load($class[0]);
		$controller = new $class[0]();
		return call_user_func_array([$controller, $class[1]], []);
	}

	return $route_check();
}

$found = 0;
foreach ($routes as $route_key => $route_values) {
	
	// check ada variable tambahan
	$line = strpos($route_key, ':');
	if($line){
		// ambil url asli
		$temp_url = substr($route_key, 0, $line);
		$true_url = substr($urls, 0, $line);

		if($temp_url === $true_url) {
			// simpan variable
			$variable_next = str_replace($temp_url, '', $urls);

			// variablenya
			$used = str_replace('/', '', substr($route_key, $line+1, strlen($route_key)));
			$used = explode(":", $used);
			$parameter = [$variable_next];
			if(count($used) > 1){
				$parameter = [];
				$variable_next = explode('/', $variable_next);

				foreach ($used as $key => $value) {
					array_push($parameter, $variable_next[$key]);
				}
			}

			$route_check = $route_values;
			if(is_string($route_check)){
				$class = explode('@', $route_check);

				load($class[0]);
				$controller = new $class[0]();
				return call_user_func_array([$controller, $class[1]], $parameter);
			}

			return call_user_func_array($route_values, $parameter);
		}
	}else{
		if($urls == $route_key){
			$route_check = $route_values;
			if(is_string($route_check)){
				$class = explode('@', $route_check);

				load($class[0]);
				$controller = new $class[0]();
				return call_user_func_array([$controller, $class[1]], []);
			}

			return $route_check();
		}
	}
}

if($found == 0){
	abort(404);
}

