<?php

namespace app\Core;

use app\Libraries\Routing\Router;

class Application
{


	public Router $router;


	public function __construct()
	{
		$this->router = new Router();
	}


	public function run()
	{
		try
		{
			echo $this->router->resolve();
		} catch (\Exception $e)
		{
			echo $e;
		}
	}


}