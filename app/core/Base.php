<?php

namespace Webhade\core;

class Base
{
	public $db;

	public function __construct()
	{
		$this->db = new Database;
		$this->db->init();
	}
}