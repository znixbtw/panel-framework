<?php

namespace app\Controllers\Site;

use app\Models\Site\Cheat;

class CheatController extends Cheat
{


	public function getStatus() : string
	{
		return $this->status();
	}


	public function getVersion() : float
	{
		return $this->version();
	}


	public function getMaintenance() : bool
	{
		return $this->maintenance();
	}


}