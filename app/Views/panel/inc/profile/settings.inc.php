<?php

use app\Helpers\Security; ?>

<h1 class="h4 text-accent">Change Password</h1>
<hr/>

<form method="post"
      class="text-white-50">

	<?= Security::csrfGenerate(); ?>

	<div class="mb-2">
		<label for="currentPassword"
		       class="form-label fw-bold text-uppercase">Current Password</label>
		<input type="password"
		       class="form-control bg-contrast border px-2 py-1 shadow-none"
		       id="currentPassword"
		       name="currentPassword"
		       minlength="4"
		       required/>
	</div>

	<div class="mb-2">
		<label for="newPassword"
		       class="form-label fw-bold text-uppercase">New Password</label>
		<input type="password"
		       class="form-control bg-contrast border px-2 py-1 shadow-none"
		       id="newPassword"
		       name="newPassword"
		       minlength="4"
		       required/>
	</div>

	<button type="submit"
	        class="btn border rounded bg-contrast my-1"
	        name="changePassword">
		Update
	</button>

</form>