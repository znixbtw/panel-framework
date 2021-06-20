<div class="container">
	<div class="row g-5">

		<div class="col-12 col-lg-3 col-md-5">
			<div class="border border-2  rounded-3">

				<div class="nav flex-column nav-pills"
				     id="v-pills-tab"
				     role="tablist"
				     aria-orientation="vertical">

					<div class="p-3 bg-secondary border-bottom border-2">
						<span class="text-white-50">Account settings</span>
					</div>

					<button class="nav-link active text-start"
					        id="v-pills-home-tab"
					        data-bs-toggle="pill"
					        data-bs-target="#v-pills-home"
					        type="button"
					        role="tab"
					        aria-controls="v-pills-home"
					        aria-selected="true">Info
					</button>
					<button class="nav-link text-start"
					        id="v-pills-settings-tab"
					        data-bs-toggle="pill"
					        data-bs-target="#v-pills-settings"
					        type="button"
					        role="tab"
					        aria-controls="v-pills-settings"
					        aria-selected="false">Settings
					</button>
					<button class="nav-link text-start"
					        id="v-pills-settings-tab"
					        data-bs-toggle="pill"
					        data-bs-target="#v-pills-subscription"
					        type="button"
					        role="tab"
					        aria-controls="v-pills-subscription"
					        aria-selected="false">Subscription
					</button>
				</div>
			</div>
		</div>

		<div class="col pt-2">
			<div class="tab-content"
			     id="v-pills-tabContent">

				<div class="tab-pane fade show active"
				     id="v-pills-home"
				     role="tabpanel"
				     aria-labelledby="v-pills-home-tab">
					<?php
					include_once 'inc/profile/info.inc.php' ?>
				</div>

				<div class="tab-pane fade"
				     id="v-pills-settings"
				     role="tabpanel"
				     aria-labelledby="v-pills-settings-tab">
					<?php
					include_once 'inc/profile/settings.inc.php' ?>
				</div>

				<div class="tab-pane fade"
				     id="v-pills-subscription"
				     role="tabpanel"
				     aria-labelledby="v-pills-subscription-tab">
					<?php
					include_once 'inc/profile/subscription.inc.php' ?>
				</div>

			</div>
		</div>

	</div>
</div>