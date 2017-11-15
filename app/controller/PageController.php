<?php
namespace Webhade\controller;

use Webhade\library\Content;

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
}