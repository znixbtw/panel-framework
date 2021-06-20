<?php

namespace app\Helpers;

class Utility
{


	// Returns XSS Proof strings for @param
	public static function e(string $string) : string
	{
		return htmlspecialchars($string, ENT_QUOTES, CHAR_ENCODING);
	}


	// Returns random strings
	public static function random() : string
	{
		return bin2hex(openssl_random_pseudo_bytes(10));
	}


	// Get Method
	public static function getMethod() : string
	{
		return $_SERVER['REQUEST_METHOD'];
	}


	// Gets the current URI
	public static function getCurrentUri() : string
	{
//		$request = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL) ?? '/';
//		$invalidStr = strpos($request, '?');
//		$index = strpos($request, 'index');
//		if ($invalidStr)
//		{
//			$input = substr($request, 0, $invalidStr);
//			return trim($input, '/');
//		}
//		if ($index)
//		{
//			$input = substr($request, 0, $index);
//			return trim($input, '/');
//		}
//		return trim($request, '/');

		$uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL) ?? '/';
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		return '/' . trim($uri, '/');
	}


	// Returns true if string matches the regex
	public static function isCleanString(string $string) : bool
	{
		$allowedChar = '/^[a-zA-Z0-9]*$/';
		return (bool) preg_match($allowedChar, $string);
	}


	// Validates length
	public static function validLen(string $value, int $minimum, int $maximum) : bool
	{
		$length = strlen($value);
		if ($length < $minimum) return false;
		elseif ($length > $maximum) return false;
		else return true;
	}


	// Set flash message
	public static function setFlash(string $message) : void
	{
		Session::set('FLASH-MSG', $message);
	}


	// Display flash message
	public static function getFlash() : ?string
	{
		if (isset($_SESSION['FLASH-MSG']))
		{
			$message = $_SESSION['FLASH-MSG'];
			Session::unset('FLASH-MSG');
		}
		return $message ?? null;
	}


	// Exits with error message
	public static function throwException(string $error, int $statusCode) : void
	{
		require_once(APP_ROOT . '/Views/layouts/error.layout.php');
		exit;
	}


	// Returns bool if REQUEST_METHOD matches @param
	public static function request(string $method) : bool
	{
		return $_SERVER['REQUEST_METHOD'] === $method;
	}


	// Redirects user to @param
	// TODO : add status code to all redirects
	public static function redirect(string $location, int $statusCode = null) : void
	{
		header("location:{$location}", true, $statusCode);
		exit;
	}


	// Refreshes the current page
	public static function refresh() : void
	{
		header('Refresh: 0');
	}


}