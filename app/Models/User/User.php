<?php

namespace app\Models\User;

use app\Core\Database;
use app\Helpers\Security;
use app\Helpers\Session;

class User
{


	private Database $db;
	private array $user;


	public function __construct()
	{
		$this->db = new Database;
		$this->user = Session::getUser();
	}


	protected function password(string $currentPassword, string $newPassword) : bool
	{
		// SELECT Query for username
		$this->db->prepare('SELECT * FROM `users` WHERE `uid` = ? LIMIT 1');
		$user = $this->db->fetch([$this->user['uid']]);

		if (Security::hashDecrypt($currentPassword, $user->password))
		{
			// Hash Password
			$hashPassword = Security::hashEncrypt($newPassword);
			// UPDATE Query for password
			$this->db->prepare('UPDATE `users` SET `password` = ? WHERE `uid` = ?');
			$this->db->execute([$hashPassword, $this->user['uid']]);
			return true;
		} else return false;

	}


}