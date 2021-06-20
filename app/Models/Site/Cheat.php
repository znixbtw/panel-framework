<?php

namespace app\Models\Site;

use app\Core\Database;

class Cheat
{


	private Database $db;


	public function __construct()
	{
		$this->db = new Database;
	}


	protected function status() : string
	{
		$this->db->prepare('SELECT `status` FROM `cheat`');
		$status = $this->db->fetch()->status;
		return ($status ? 'detected' : 'undetected');
	}


	protected function version() : float
	{
		$this->db->prepare('SELECT `version` FROM `cheat`');
		return $this->db->fetch()->version;
	}


	protected function maintenance() : bool
	{
		$this->db->prepare('SELECT `maintenance` FROM `cheat`');
		return $this->db->fetch();
	}


}