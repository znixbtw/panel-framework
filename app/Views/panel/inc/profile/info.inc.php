<h1 class="h4 text-accent">Account Info</h1>
<hr/>

<div class="text-white-50">

	<span class="text-muted fw-bold text-uppercase">User ID</span>
	<div class="px-2 py-1 my-2 rounded border bg-contrast"><?= $user['uid'] ?></div>

	<span class="text-muted fw-bold text-uppercase">Username</span>
	<div class="px-2 py-1 my-2 rounded border bg-contrast"><?= $user['username'] ?></div>

	<span class="text-muted fw-bold text-uppercase">Invited By</span>
	<div class="px-2 py-1 my-2 rounded border bg-contrast"><?= $user['invitedBy'] ?></div>

	<span class="text-muted fw-bold text-uppercase">Subscription</span>
	<div class="px-2 py-1 my-2 rounded border bg-contrast">Not added</div>

</div>