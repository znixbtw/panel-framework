<?php

namespace app\Libraries\Routing;

use app\Helpers\Utility;

class Router
{


	private array $routeMap = [];


	public function get(string $url, $callback)
	{
		$this->routeMap['GET'][$url] = $callback;
	}


	public function post(string $url, $callback)
	{
		$this->routeMap['POST'][$url] = $callback;
	}


	public function resolve()
	{
		$method = Utility::getMethod();
		$url = Utility::getCurrentUri();
		$callback = $this->routeMap[$method][$url] ?? false;

		//debug var_dump($callback);

		if (!$callback)
		{
			Utility::throwException('Page Not found.', 404);
		}

//		if (is_array($callback))
//		{
//			$controller = new $callback[0];
//			$controller->action = $callback[1];
//			Application::$app->controller = $controller;
//			$middlewares = $controller->getMiddlewares();
//			foreach ($middlewares as $middleware)
//			{
//				$middleware->execute();
//			}
//			$callback[0] = $controller;
//		}
		return call_user_func($callback);
	}


// Renders view for the specified page
//	public static function view(array $page, int $authLevel) : void
//	{
//		$page['title'] = $page[0];
//		$page['route'] = $page[1];
//
//		if (array_key_exists(2, $page)) $page['path'] = $page['2'];
//		else $page['path'] = $page['route'];
//
//		$request = Utility::getUri();
//
//		if ($request === $page['route'])
//		{
//			require_once(PUBLIC_ROOT . 'layouts/app.layout.php');
//		}
//	}
}