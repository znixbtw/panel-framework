<?php

namespace app\Helpers;

class Security
{


	// Generate CSRF token
	// TODO: better csrf protection
	public static function csrfGenerate() : string
	{
		Session::set('csrfToken', Utility::random());
		$csrf = Session::get('csrfToken');
		return <<<EOD
				<input type="hidden" name="csrfToken" value="{$csrf}"> 
				EOD;
	}


	// Validate CSRF token
	public static function csrfValidate(string $token) : void
	{
		if (!hash_equals($token, Session::get('csrfToken'))) Utility::throwException('CSRF Token expired.', 400);
	}


	// Hash @param
	public static function hashEncrypt(string $string) : string
	{
		return password_hash($string, HASH_ALGO);
	}


	// Verify @param with the hashed @param
	public static function hashDecrypt(string $string, string $hash) : bool
	{
		return password_verify($string, $hash);
	}


	// Exits if not User
	public static function isUserOrExit() : void
	{
		if (!Session::isLogged()) exit;
	}


}