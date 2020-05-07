<?php namespace App\Core;

use App\Core\Bcrypt;
use App\Models\User;

class Auth
{

	public static function check($key = 'auth')
	{
		$auth = \Session::get($key);
		if(isset($auth))
		{
			return true;
		}
		return false;
	}
		
	public static function login($username,$password,$remember = false)
	{
		$user = User::findByUsername($username);

		if(empty($user))
			return false;
		else
			$user = $user[0];
		if(Bcrypt::checkPassword($password,$user->password))
		{
			\Session::set('auth',$username);
			if($remember)
				\Cookie::set('auth',$username,60*60);
			\Cookie::set('name',$user->name,60*60);
			return true;
		} 

		return false;
	}

	public static function adminLogin($username,$password)
	{
		if(Bcrypt::checkPassword($password,ADMIN_PASS) && ADMIN_USER == $username)
		{
			\Session::set('admin',$username);
			return true;
		} 

		return false;
	}

	public static function logout($key = 'auth')
	{
		if(self::check($key))
		{
			\Session::remove($key);
			\Cookie::remove($key);
			return true;
		}
		return false;
	}

	public static function redirectToLogin($url,$key = 'auth')
	{
		if(!self::check($key))
		{
			header('Location: '.url($url));
			exit();
		}
	}

	public static function redirect($url,$key = 'auth')
	{
		if(self::check($key))
		{
			header('Location: '.url($url));
			exit();
		}
	}

	public static function returnUser()
	{
		if(self::check())
		{
			return User::findByUsername(\Session::get('auth'))[0];
		}
	}

}