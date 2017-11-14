<?php

namespace Webhade\model;

class PageModel extends \Webhade\Core\Base
{
	public function getData()
	{
		$sth = $this->db->pdo->prepare('SELECT * FROM test');
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
}