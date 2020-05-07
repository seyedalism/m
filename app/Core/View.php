<?php namespace App\Core;

class View
{
	public static function render($view,$data)
	{
		\Session::remove('csrf_token');
		$cache = ROOTPATH.DIRSEP.'app'.DIRSEP.'Core'.DIRSEP.'cache';
		$blade = 
		new \eftec\bladeone\BladeOne(VIEWSPATH,$cache,
			\eftec\bladeone\BladeOne::MODE_SLOW);

        $blade->directive('csrf', function () {
            $csrf = \Session::csrf_token();
            $csrf = "<input type='hidden' name='csrf_token' value='$csrf' >";
            return $csrf;
        });

        echo $blade->run($view,$data);
	}
}