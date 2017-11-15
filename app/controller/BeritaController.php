<?php
namespace Webhade\controller;

use Webhade\core\Router;
use Webhade\core\Layout;
use Webhade\model\BeritaModel;
use Webhade\library\Http;

class BeritaController
{
	public $berita;

	public function __construct(){
		$this->berita = new BeritaModel;
	}

	public function index()
	{
		
		$berita = $this->berita->getAll();
		$data = [
			'berita' => $berita
		];

		if (isset($_SESSION['notif'])){
			$data['notif'] = $_SESSION['notif'];
			unset($_SESSION['notif']);
		}

		echo Layout::render('berita/list', $data);
	}

	public function add()
	{
		$notif = '';

		if (isset($_POST['submit']))
		{
			$judul = filter_var($_POST['judul'], FILTER_SANITIZE_STRING);
			$isi = filter_var($_POST['isi'], FILTER_SANITIZE_STRING);
			
			$insert = $this->berita->insert($judul, $isi);

			if ($insert === true)
			{
				$_SESSION['notif'] = 'sukses input';
				
				Http::redirect('berita');

			} else {
				$notif = 'gagal input';
			}
		}

		echo Layout::render('berita/add',[
			'notif' => $notif
		]);		
	}
	
	public function edit()
	{
		echo 'edit';
	}

	public function delete()
	{
		echo 'delete';
	}

	public function detail()
	{
		echo 'detail';
	}
}