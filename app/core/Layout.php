<?php

namespace Webhade\core;

class Layout
{
	public static function render($filename, array $params = array())
	{
		$viewfile = VIEW_PATH . $filename .'.php';
		if (file_exists($viewfile)){
			ob_start();
			extract($params);
			require $viewfile;
			return ob_get_clean();
		} else {
			throw new \Exception("file view " . $filename . " tidak ditemukan");
		}
	}
}