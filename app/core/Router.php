<?php
namespace Webhade\core;

class Router
{
	public function parse()
	{
		if (!isset($_GET['url']))
		{
			echo 'index';	
		} else {
			
			$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
			
			$url = trim($url, '/');

			$uri = explode('/', $url);
			
			$class = $uri[0];

			if (isset($uri[1])){
				$method = $uri[1];
			} else {
				$method = 'index';
			}

			$fqn = '\Webhade\controller\\' . ucwords($class) . 'Controller';

			if (class_exists($fqn))
			{
				$hal = new $fqn;

				if (method_exists($hal, $method)){
					$hal->{$method}();
				} else {
					echo '404 not found';
				}
				
			} else {
				echo '404 not found';
			}
		}
	}
}