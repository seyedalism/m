<?php

class Input
{
    private static $post;
    private static $get;
    private static $files;
    private static $lastRequest = 'get';

    public static function init()
    {
        self::$post = $_POST;
        self::$get = $_GET;
        self::$files = $_FILES;
        unset($_POST);
        unset($_FILES);
    }

    public static function clear()
    {
        self::$post  = null;
        self::$get   = null;
        self::$files = null;
    }

    public static function post()
    {
        if(isset(self::$post['csrf_token']) && self::checkToken(self::$post['csrf_token']))
        {
            self::$lastRequest = 'post';
            return self::$post;
        }
        return null;
    }

    public static function files()
    {
        if(isset(self::$post['csrf_token']) && self::checkToken(self::$post['csrf_token']))
        {
            self::$lastRequest = 'post';
            return self::$files;
        }
        return null;
    }
    public static function get()
    {
        if(isset(self::$get['csrf_token']) && self::checkToken(self::$get['csrf_token']))
        {
            self::$lastRequest = 'get';
            return self::$get;
        }
        return null;
    }

    public static function checkToken($token)
    {
            foreach (\Session::get('csrf_token') as $value)
                if($value == $token)
                    return true;
            return false;    
    }

    public static function old($val)
    {
        $lastRequest = self::$lastRequest;
        return isset(self::$$lastRequest[$val]) ? self::$$lastRequest[$val] : '';
    }
}