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

			include CONFIG_DIR . 'routes.php';

			$notfound = 0;

			if (isset($routes))
			{
				if (is_array($routes))
				{
					foreach ($routes as $key => $value)
					{
						$pattern = '#^'.$key.'$#';

						if (preg_match($pattern, $url)==true)
						{
							$uri = explode(':', $value);

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
								$notfound = 1;
							}
						}
					}

					if ($notfound==1){
						echo '404 not found';
					}
				}
			}
			
		}
	}

	public static function uri_segment($s = 0)
	{
        $suri = $_SERVER['REQUEST_URI'];

        $parse = parse_url($suri);

        $uri = trim($parse['path'],'/');

        if (!empty($uri))
        {
            $segment = explode('/',$uri);

            if (count($segment) > 0){
                if (isset($segment[$s])){
                    return $segment[$s];
                }
            }
        }
   	}
}