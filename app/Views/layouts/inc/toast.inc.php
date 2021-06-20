<?php

use app\Helpers\Utility;

if (isset($_SESSION['FLASH-MSG'])) : ?>
	<div class="position-fixed bottom-0 start-50 translate-middle-x p-3"
	     style="z-index: 5">
		<div id="liveToast"
		     class="toast show"
		     role="alert"
		     aria-live="polite"
		     aria-atomic="true"
		     data-bs-animation="true">
			<div class="d-flex">
				<div class="toast-body text-white-50">
					<?= Utility::e(Utility::getFlash()); ?>
				</div>
				<button type="button"
				        id="hideToast"
				        class="btn-close btn-close-white me-2 m-auto"
				        data-bs-dismiss="toast"
				        aria-label="Close"></button>
			</div>
		</div>
	</div>
<?php
endif; ?>