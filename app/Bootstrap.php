<?php namespace App;

class Bootstrap
{
	public function run()
	{
		require_once 'Core/config.php';
		require_once 'Core/helpers.php';
		require_once 'Core/Session.php';
		require_once 'Core/Cookie.php';
		require_once 'Core/Input.php';
		require_once 'Core/jdf.php';
		require_once ROOTPATH . DIRSEP . 'routes.php';
		\App\Core\Router::route();
    }
}