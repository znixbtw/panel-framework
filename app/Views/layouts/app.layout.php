<?php

use app\Helpers\Security;
use app\Helpers\Session;

$user = Session::getUser();
/* @var $path */
?>

<!-- Render header -->
<?php
require_once "inc/header.inc.php"; ?>
<!-- / Render header -->

<!-- Render preloader -->
<?php
if (!DEBUG) require_once "inc/preloader.inc.php"; ?>
<!-- / Render preloader -->

<!-- Render navbar -->
<?php
require_once "inc/navbar.inc.php"; ?>
<!-- / Render navbar -->

<!-- Render content -->
<main>

	<!-- Render view page -->
	<div class="container mt-5">
		<?php
		require_once APP_ROOT . "/Views/${path}.php"; ?>
	</div>
	<!-- / Render view page -->

	<!-- Render toast-->
	<?php
	require_once "inc/toast.inc.php"; ?>
	<!-- / Render toast -->

</main>
<!-- / Render content -->

<!-- Render footer -->
<?php
require_once "inc/footer.inc.php"; ?>
<!-- / Render footer -->
