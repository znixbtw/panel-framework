<?php

namespace app\Controllers\Site;

use app\Models\Site\Site;

class SiteController extends Site
{


	public function getTotalUsers() : int
	{
		return $this->totalUsers();
	}


	public function getTotalPremium() : int
	{
		return $this->totalPremium();
	}


	public function getTotalBanned() : int
	{
		return $this->totalBanned();
	}


}