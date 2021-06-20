<?php

use app\Helpers\Utility;
use app\Helpers\Session;

?>
<nav class="navbar navbar-expand-md navbar-dark py-3">
	<div class="container">
		<a class="navbar-brand"
		   href="<?= Utility::e(SITE_URL); ?>"><?= Utility::e(SITE_NAME); ?></a>
		<button class="navbar-toggler"
		        type="button"
		        data-bs-toggle="collapse"
		        data-bs-target="#navbarNav"
		        aria-controls="navbarNav"
		        aria-expanded="false"
		        aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse"
		     id="navbarNav">
			<?php
			if (!Session::isLogged()): ?>
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link <?= isset($page['title']) && $page['title'] == 'Login' ? 'active' : ''; ?>"
						   href="/auth/login">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= isset($page['title']) && $page['title'] == 'Register' ? 'active' : ''; ?>"
						   href="/auth/register">Register</a>
					</li>
				</ul>
			<?php
			else: ?>
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link <?= isset($page['title']) && $page['title'] == 'Dashboard' ? 'active' : ''; ?>"
						   href="/panel/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= isset($page['title']) && $page['title'] == 'Profile' ? 'active' : ''; ?>"
						   href="/panel/profile">Profile</a>
					</li>
				</ul>
				<form method="post"
				      action="/auth/logout"
				      class="d-flex px-2">
					<button type="submit"
					        class="btn"
					        name="logout">Logout
					</button>
				</form>
			<?php
			endif; ?>
		</div>
	</div>
</nav>