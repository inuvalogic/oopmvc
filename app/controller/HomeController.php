<?php
namespace Webhade\controller;

use Webhade\model\PageModel;

class HomeController
{
	public function index()
	{
		$model = new PageModel;
		$model->getData();
	}
}