<?php
namespace Webhade\library;

class Http
{
	public static function redirect($url)
	{
		header("Location: /". $url);
	}
}