<?php

namespace app\Models\Site;

use app\Core\Database;

class Site
{


	private Database $db;


	public function __construct()
	{
		$this->db = new Database;
	}


	protected function totalUsers() : int
	{
		$this->db->prepare('SELECT `uid` FROM `users`');
		return $this->db->rowCount();
	}


	protected function totalPremium() : int
	{
		$this->db->prepare('SELECT `uid` FROM `users` WHERE `roleID` = 3');
		return $this->db->rowCount();
	}


	protected function totalBanned() : int
	{
		$this->db->prepare('SELECT `uid` FROM `users` WHERE `roleID` = 0');
		return $this->db->rowCount();
	}


}