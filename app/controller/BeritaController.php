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
		$notif = '';

		$id = Router::uri_segment(2);
		$berita = $this->berita->getSingleData($id);

		if(!$berita) 
		{
			echo 'Berita Tidak ada';
		}

		if (isset($_POST['edit']))
		{
			$judul = filter_var($_POST['judul'], FILTER_SANITIZE_STRING);
			$isi = filter_var($_POST['isi'], FILTER_SANITIZE_STRING);
		
			$update = $this->berita->update($judul, $isi, $id);

			if ($update === true)
			{
				$_SESSION['notif'] = 'sukses edit';
				
				Http::redirect('berita');

			} else {
				$notif = 'gagal edit';
			}
		}

		echo Layout::render('berita/edit',[
			'notif' => $notif,
			'id'  => $id,
			'berita' => $berita,
		]);	
	}

	public function delete()
	{
		$id = Router::uri_segment(2);
		$delete = $this->berita->delete($id);

		if ($delete === true)
		{
			$_SESSION['notif'] = 'sukses hapus';
			
			Http::redirect('berita');

		} else {
			$notif = 'gagal hapus';
		}		
	}

	public function detail()
	{
		$id = Router::uri_segment(1);
		$berita = $this->berita->getSingleData($id);
		$data = [
			'berita' => $berita
		];

		echo Layout::render('berita/detail', $data);
	}
}