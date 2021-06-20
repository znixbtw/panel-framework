<?php

namespace app\Libraries\Routing;

use app\Controllers\User\AuthController;
use app\Controllers\User\UserController;

class Routes
{


	private static function render(string $path, array $page) : void
	{
		require_once(APP_ROOT . '/Views/layouts/app.layout.php');
	}


	private static function setPageData($title) : array
	{
		return $page = [
			'title' => $title,
		];
	}


	private static function authMiddleware(int $level = 0) : void
	{
		(new AuthController)->isAuthenticated($level);
	}


	public static function index()
	{
		$pageData = self::setPageData('Home');
		self::render('index', $pageData);
	}


	public static function tos()
	{
		$pageData = self::setPageData('Terms of Service');
		self::render('tos', $pageData);
	}


	public static function privacy()
	{
		$pageData = self::setPageData('Privacy & Policy');
		self::render('privacy', $pageData);
	}


	public static function panel()
	{
		// Middleware
		self::authMiddleware(2);
		$pageData = self::setPageData('Dashboard');
		self::render('panel/index', $pageData);
	}


	public static function profile()
	{
		// Middleware
		self::authMiddleware(2);
		// Handle POST requests
		(new UserController)->changePassword($_POST);
		// Handle GET requests
		$pageData = self::setPageData('Profile');
		self::render('panel/profile', $pageData);
	}


	public static function login()
	{
		// Middleware
		self::authMiddleware(1);
		// Handle POST requests
		(new AuthController)->loginUser($_POST);
		// Handle GET requests
		$pageData = self::setPageData('Login');
		self::render('auth/login', $pageData);
	}


	public static function register()
	{
		// Middleware
		self::authMiddleware(1);
		// Handle POST requests
		(new AuthController)->registerUser($_POST);
		// Handle GET requests
		$pageData = self::setPageData('Register');
		self::render('auth/register', $pageData);
	}


	public static function logout()
	{
		// Middleware
		self::authMiddleware(2);
		// Handle POST requests
		(new AuthController)->logoutUser();
	}


}