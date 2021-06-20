<?php

use app\Controllers\Site;

$siteData = new Site\SiteController();
$cheatData = new Site\CheatController();
?>

<div class="container overflow-hidden">

	<div class="pb-3">
		<h1 class="h4">Welcome, <span class="text-accent"><?= $user['username'] ?></span></h1>
	</div>

	<div class="row g-3">

		<div class="col-12 col-lg-8">
			<div class="border border-2 rounded-3">
				<div class="col-12 bg-secondary border-bottom border-2 ">
					<h1 class="h4 p-3">Session dump</h1>
				</div>
				<div class="p-3">
					<?php
					var_dump($_SESSION); ?>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-4">
			<div class="border border-2 rounded-3">

				<div class="col-12 bg-secondary border-bottom border-2 ">
					<h1 class="h4 p-3">Loader</h1>
				</div>

				<div class="p-3">
					<ul class="list-group text-white-50">
						<li class="list-group-item d-flex justify-content-between text-capitalize">
							<b>Status:</b><span><?= $cheatData->getStatus(); ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<b>Version:</b><span>v<?= $cheatData->getVersion(); ?></span>
						</li>
					</ul>
					<div class="d-grid mt-2">
						<button class="btn rounded border-2"
						        type="button">
							Download
						</button>
					</div>
				</div>

			</div>
		</div>

		<div class="col-12">
			<div class="border border-2 rounded-3">

				<div class="p-3 bg-secondary border-bottom border-2">
					<h1 class="h4">Stats</h1>
				</div>

				<div class="p-3">
					<div class="row text-center text-white-50">
						<div class="col-xl-4 col-md-6 col-sm-12">
							<b>Registered</b>
							<div class="fs-5"><?= $siteData->getTotalUsers(); ?></div>
						</div>
						<div class="col-xl-4 col-md-6 col-sm-12">
							<b>Premium</b>
							<div class="fs-5"><?= $siteData->getTotalPremium(); ?></div>
						</div>
						<div class="col-xl-4 col-md-6 col-sm-12">
							<b>Banned</b>
							<div class="fs-5"><?= $siteData->getTotalBanned(); ?></div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>