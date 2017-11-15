<?php
namespace Webhade\controller;

use Webhade\library\Content;
use Webhade\core\Router;

class PageController
{
	public function index()
	{
		$tes = new Content;
		echo $tes->halo('wisnu');

		echo '<br>halaman page';
	}

	public function about()
	{
		$tes = new Content;
		echo $tes->halo('wisnu');
		echo 'halaman about';
	}

	public function cms()
	{
		$page = Router::uri_segment(0);
		
	}
}