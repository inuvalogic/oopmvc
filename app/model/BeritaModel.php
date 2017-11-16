<?php

namespace Webhade\model;

use \PDO;

class BeritaModel extends \Webhade\core\Base
{
	public function getAll()
	{
		$sth = $this->db->pdo->prepare('SELECT * FROM `berita` ORDER BY `post_date` DESC');
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}

	public function insert($judul, $isi)
	{
		try {

			$sth = $this->db->pdo->prepare('INSERT INTO `berita` (post_date, judul, isi) VALUES (NOW(), :title, :content)');
			
			$sth->bindValue(':content', $isi, PDO::PARAM_STR);
			$sth->bindValue(':title', $judul, PDO::PARAM_STR);
			$sth->execute();

			return true;

		} catch(\PDOException $e){

			return false;
		}
	}

	public function getSingleData($id)
	{
		$sth = $this->db->pdo->prepare('SELECT * FROM `berita` WHERE id = :id');
		$sth->bindValue(':id', $id, PDO::PARAM_STR);
		$sth->execute();
		$data = $sth->fetch();
		return $data;
	}

	public function update($judul, $isi, $id)
	{
		try {

			$sth = $this->db->pdo->prepare('UPDATE `berita` SET `judul` = :judul, `isi` = :isi WHERE id = :id');

			$sth->bindValue(':judul', $judul, PDO::PARAM_STR);
			$sth->bindValue(':isi', $isi, PDO::PARAM_STR);
			$sth->bindValue(':id', $id, PDO::PARAM_STR);
			$sth->execute();

			return true;

		} catch(\PDOException $e) {

			return false;

		}
	}

	public function delete($id)
	{
		try {

			$sth = $this->db->pdo->prepare('DELETE FROM `berita` WHERE id = :id');

			$sth->bindValue(':id', $id, PDO::PARAM_STR);
			$sth->execute();

			return true;

		} catch(\PDOException $e) {

			return false;

		}
	}
}