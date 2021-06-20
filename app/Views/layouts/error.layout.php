<?php

use app\Helpers\Session;
use app\Helpers\Utility;

/* @var $statusCode */
/* @var $error */
Session::init();
http_response_code($statusCode);
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="viewport"
	      content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<!-- Fontawesome CSS -->
	<link rel="stylesheet"
	      href="/public/assets/vendor/fontawesome/css/all.css"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet"
	      href="/public/assets/vendor/bootstrap/css/bootstrap.min.css"/>
	<!-- Custom CSS -->
	<link rel="stylesheet"
	      href="/public/assets/css/theme.css"/>
	<!-- Title -->
	<title><?= "Error | " . SITE_NAME ?></title>
</head>

<body class="text-white">
<main>


	<div class="container mt-5">
		<div class="border border-2 rounded-3">

			<div class="p-3 bg-secondary border-bottom border-2 ">
				<h1 class="h4">Error!</h1>
			</div>

			<div class="p-3 text-white-50">
				<?= Utility::e($error); ?>
			</div>

		</div>
	</div>
</main>
</body>
</html>

