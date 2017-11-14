<?php
namespace Webhade\core;

class Router
{
	public function parse()
	{
		if (!isset($_GET['url']))
		{
			
		} else {
			$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
			$url = trim($url, '/');
			$uri = explode('/', $url);
		}
	}
}