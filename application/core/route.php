<?php
	class Route
	{
		static function start()
		{
			$controller = 'Main';
			$action = 'index';
			
			$routes = explode('/', $_SERVER['REQUEST_URI']);
			
			if($routes[2] == 'en' || $routes[2] == 'ua')
			{
				Controller::$language = $routes[2];

				$lang_file_path = $_SERVER['DOCUMENT_ROOT'] . '/site/lang/' . Controller::$language . '.ini';
				
				if(file_exists($lang_file_path))
					View::$lang_array = parse_ini_file($lang_file_path, true);
			}
			else
				View::$lang_array = parse_ini_file('/lang/en.ini', true);

			if(!empty($routes[3]))
			{
				$controller = $routes[3];
			}

			if(!empty($routes[4]))
			{
				$action = $routes[4];
			}

			$controller_name = 'Controller_' . ucfirst($controller);
			$model_name = 'Model_' . ucfirst($controller);
			$action_name = 'action_' . $action;

			//echo $controller_name . "<br/>" . $model_name . "<br/>" . $action_name . "<br/>";

			$model_file = strtolower($model_name) . '.php';
			$model_path = 'application/models/' . $model_file;
			
			if(file_exists($model_path))
				require_once 'application/models/' . $model_file;

			$controller_file = strtolower($controller_name) . '.php';
			$controller_path = 'application/controllers/' . $controller_file;

			if(file_exists($controller_path))
				require_once 'application/controllers/' . $controller_file;

			$controller = new $controller_name;
			$action = $action_name;

			if(method_exists($controller, $action))
				$controller->$action();
			else
				echo 'hello error';
		}
	}