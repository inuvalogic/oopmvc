<?php

namespace Webhade\core;

use PDO;

class Database
{
	public $pdo;
	public $pdo2;

	public function init()
	{
		try {
			$this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(
				PDO::ATTR_PERSISTENT => true
			));
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->pdo2 = new PDO('mysql:host='.DB_HOST2.';dbname='.DB_NAME2, DB_USER2, DB_PASS2, array(
				PDO::ATTR_PERSISTENT => true
			));
			$this->pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch(\PDOException $e){
			echo $e->getMessage();
			// throw new \Exception("Ga bisa connect ke database");
		}
	}
}