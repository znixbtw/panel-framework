<?php

namespace app\Controllers\User;

use app\Helpers\Utility;
use app\Helpers\Security;
use app\Models\User\User;

// Verify user is logged in
Security::isUserOrExit();


class UserController extends User
{


	// Change password
	public function changePassword(array $data) : void
	{

		if (Utility::request('POST') && isset($_POST['changePassword']))
		{

			// Validate CSRF Token
			Security::csrfValidate($data['csrfToken']);

			// Bind data array
			$currentPassword = (string) $data['currentPassword'];
			$newPassword = (string) $data['newPassword'];

			// Check if @param are empty
			if (empty($currentPassword) || empty($newPassword)) return;

			// Check if the passwords are same
			if (strcmp($currentPassword, $newPassword) === 0) return;

			// Check for valid len in password
			if (!Utility::validLen($newPassword, 4, 255)) return;

			// Send data to password function
			$result = $this->password($currentPassword, $newPassword);

			if ($result) Utility::setFlash('Password changed successfully.'); // Set flash message
			else Utility::setFlash('Something went wrong.'); // Set flash message

			// Refresh the page
			Utility::refresh();
		}
	}


}