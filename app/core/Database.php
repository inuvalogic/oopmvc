<?php

namespace Webhade\core;

use PDO;

class Database
{
	public $pdo;

	public function init()
	{
		try {
			$this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(
				PDO::ATTR_PERSISTENT => true
			));
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $e){
			echo $e->getMessage();
			// throw new \Exception("Ga bisa connect ke database");
		}
	}
}