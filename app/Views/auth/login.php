<?php

use app\Helpers\Security;

?>
<div class="row mx-2 justify-content-center">
	<div class="col-lg-5 col-md-12">

		<form class="row border border-2 rounded-3"
		      id="auth"
		      method="post">

			<div class="col-12 bg-secondary border-bottom border-2 ">
				<h1 class="h4 my-3 text-white-50 text-center text-uppercase"><?= $page['title'] ?></h1>
			</div>

			<div class="col-12 p-3">

				<?= Security::csrfGenerate(); ?>

				<input type="text"
				       class="form-control bg-dark border border-2 rounded-0 rounded-top"
				       placeholder="Username"
				       name="username"
				       minlength="3"
				       pattern="[a-zA-Z0-9]+"
				       required/>

				<input type="password"
				       class="form-control bg-dark border border-2 border-top-0 border-bottom-0 rounded-0"
				       placeholder="Password"
				       name="password"
				       minlength="4"
				       required/>

				<div class="d-grid gap-2">
					<button type="submit"
					        class="btn border-2 rounded-bottom"
					        name="login">Login
					</button>
				</div>

			</div>

			<?php
			include_once('inc/footer.inc.php') ?>

		</form>
	</div>
</div>