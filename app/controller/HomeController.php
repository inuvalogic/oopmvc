<?php
namespace Webhade\controller;

use Webhade\model\PageModel;
use Webhade\core\Layout;

class HomeController extends \Webhade\Core\Base
{
	public function index()
	{
		$model = new PageModel;
		$rows = $model->getData();
		
		$data = array('lists' => $rows, 'nama' => 'wisnu');
		
		$layout = new Layout;
		echo $layout->render('listing', $data);
	}
}