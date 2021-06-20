<?php

namespace app\Controllers\User;

use app\Helpers\Utility;
use app\Helpers\Security;
use app\Helpers\Session;
use app\Models\User\Auth;

class AuthController extends Auth
{


	// Redirects user if not logged in
	public function isAuthenticated(int $type) : void
	{
		if ($type === 1)
		{

			if (Session::isLogged())
			{
				// Set flash message
				Utility::setFlash('You are already logged in.');
				// Redirect user
				Utility::redirect('/panel');
			}

		} elseif ($type === 2)
		{

			if (!Session::isLogged())
			{
				// Set flash message
				Utility::setFlash('You are not authorised.');
				// Redirect user
				Utility::redirect('/auth/login');
			}

		} else Utility::throwException('Unhandled level of authentication provided in routes. ' . $type, 500);
	}


	// Logout function
	public function logoutUser() : void
	{
		if (Utility::request('POST') && isset($_POST['logout']))
		{
			// Destroy session
			session_unset();
			$_SESSION = [];
			session_destroy();
			// Redirect user
			Utility::redirect('/auth/login');
		}
	}


	// Registers user
	// TODO : Enable / Disable registration
	public function registerUser(array $data) : void
	{
		if (Utility::request('POST') && isset($_POST['register']))
		{
			// Validate CSRF Token
			Security::csrfValidate($data['csrfToken']);

			// Bind data array
			$username = trim($data['username']);
			$password = (string) $data['password'];
			$invite = trim($data['invite']);

			// Check if @param are empty
			if (empty($username) || empty($password) || empty($invite)) return;

			// Check for special char in username
			if (!Utility::isCleanString($username)) return;

			// Check for valid len in username
			if (!Utility::validLen($username, 3, 15)) return;

			// Check for valid len in password
			if (!Utility::validLen($password, 4, 50)) return;

			// Check if invite code is valid
			if (!$this->isRecord('invites', 'code', $invite))
			{
				Utility::setFlash('Invalid invite code.'); // Set flash message
				return;
			}

			// Check if username is taken
			if ($this->isRecord('users', 'username', $username))
			{
				Utility::setFlash('Username is taken.'); // Set flash message
				return;
			}

			// Send data to register function
			$result = $this->register($username, $password, $invite);

			if ($result)
			{
				// Set flash message
				Utility::setFlash('Registered successfully.');
				// Redirect user
				Utility::redirect('/auth/login');
			} else Utility::setFlash('Something went wrong.'); // Set flash message

			// Refresh the page
			Utility::refresh();
		}
	}


	// Logins user
	// TODO : Limit login attempts
	public function loginUser(array $data) : void
	{
		if (Utility::request('POST') && isset($_POST['login']))
		{
			// Validate CSRF Token
			Security::csrfValidate($data['csrfToken']);

			// Bind data array
			$username = trim($data['username']);
			$password = (string) $data['password'];

			// Check if @param are empty
			if (empty($username) || empty($password)) return;

			// Check for special char in username
			if (!Utility::isCleanString($username)) return;

			// Check for valid len in username
			if (!Utility::validLen($username, 3, 15)) return;

			// Check for valid len in password
			if (!Utility::validLen($password, 4, 50)) return;

			// Send data to login function
			$result = $this->login($username, $password);

			if ($result)
			{
				// Set flash message
				Utility::setFlash('Logged in successfully.');
				// Redirect user
				Utility::redirect('/panel/');
			} else Utility::setFlash('Incorrect username or password.'); // Set flash message

			// Refresh the page
			Utility::refresh();
		}
	}


}