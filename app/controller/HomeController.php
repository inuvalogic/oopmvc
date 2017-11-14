<?php
namespace Webhade\controller;

use Webhade\model\PageModel;

class HomeController
{
	public function index()
	{
		echo BASEURL;
		$model = new PageModel;
		$model->getData();
	}
}