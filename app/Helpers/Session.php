<?php

namespace app\Helpers;

class Session
{


	public static function init()
	{
		if (empty($_SESSION))
		{
			if (DEBUG) session_start();
			else
			{
				session_start([
					'cookie_lifetime' => 86400,
					'use_strict_mode' => true,
					'cookie_httponly' => true,
					'cookie_secure' => true,
					'cookie_samesite' => 'Lax',
				]);
			}
		}
	}


	public static function set(string $key, $val) : void
	{
		$_SESSION[$key] = $val;
	}


	public static function unset(string $key) : void
	{
		unset($_SESSION[$key]);
	}


	public static function get(string $key) : ?string
	{
		return $_SESSION[$key] ?? false;
	}


	public static function isLogged() : bool
	{
		return isset($_SESSION['login']) && $_SESSION['login'];
	}


	public static function getUser() : array
	{
		return [
			'uid' => self::get('uid'),
			'username' => self::get('username'),
			'invitedBy' => self::get('invitedBy'),
		];
	}


	public static function getUserRole() : int
	{
		return self::get('role');
	}


}