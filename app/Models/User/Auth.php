<?php

namespace app\Models\User;

use app\Core\Database;
use app\Helpers\Security;
use app\Helpers\Session;

class Auth
{


	private Database $db;


	public function __construct()
	{
		$this->db = new Database;
	}


	private function createSession(object $user) : void
	{
		Session::set("login", true);
		Session::set("uid", (int) $user->uid);
		Session::set("username", (string) $user->username);
		Session::set("roleID", (int) $user->roleID);
		Session::set("sub", (string) $user->sub);
		Session::set("invitedBy", (string) $user->invitedBy);
		Session::set("createdAt", (string) $user->createdAt);
	}


	protected function isRecord(string $table, string $column, string $value) : bool
	{
		$this->db->prepare("SELECT * FROM $table WHERE $column = ? LIMIT 1");
		return (bool) $this->db->rowCount([$value]);
	}


	protected function register(string $username, string $password, string $invite) : bool
	{
		// SELECT Query for invite code
		$this->db->prepare('SELECT (`createdBy`) FROM `invites` WHERE `code` = ? LIMIT 1');
		$invCreatedBy = $this->db->fetch([$invite])->createdBy;

		// Encrypt the password
		$hashPassword = Security::hashEncrypt($password);

		// INSERT Query for user
		$this->db->prepare('INSERT INTO `users` (`username`, `password`, `invitedBy`) VALUES (?, ?, ?)');

		// Check if registered successfully
		if ($this->db->execute([$username, $hashPassword, $invCreatedBy]))
		{
			// DELETE Query for invite code
			$this->db->prepare('DELETE FROM `invites` WHERE `code` = ?');
			$this->db->execute([$invite]);
			return true;
		} else return false;
	}


	protected function login(string $username, string $password) : bool
	{
		//SELECT Query for username
		$this->db->prepare('SELECT * FROM `users` WHERE `username` = ? LIMIT 1');
		$user = $this->db->fetch([$username]);

		// Check if username exists
		if (!$user) return false;

		// Check if password matches
		if (Security::hashDecrypt($password, $user->password))
		{
			// Set Session data
			$this->createSession($user);
			return true;
		}
		return false;
	}


}