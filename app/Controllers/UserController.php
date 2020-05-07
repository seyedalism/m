<?php use App\Core\Controller;

use \Gregwar\Captcha\CaptchaBuilder;
use \Gregwar\Captcha\PhraseBuilder;
use App\Models\User;
use App\Core\Auth;
use App\Core\Bcrypt;

class UserController extends Controller
{
	public function show($id = -1)
	{
        Auth::redirectToLogin('admin/login','admin');
        $user = "";
        if($id !== -1)
    		$user = User::findById($id)[0];
        return view('admin.addUser',compact('user','id'));
	}

    public function register($id = -1)
    {    
        Auth::redirectToLogin('user/login','admin');
        $error = "";
        $post = \Input::post();
        $res = false;
        if (!isset($post['edit'])) 
	        if (empty(User::findByUsername($post['username'])[0])) 
	        	if (empty(User::findByName($post['name'])[0])) 
	        		if (empty(User::findByPhone($post['phone'])[0])) 
	        			if (empty(User::findByUniNum($post['uniNum'])[0])) 
	        				$res = true;

	    if (isset($post['edit'])) 
	    	$res = true;    			

        if($res)
        {
			if (!isset($post['edit'])) 
        		$user = new User;
        	else
        		$user = User::findById($id)[0];

            $user->username = $post['username'];
            $user->password = Bcrypt::hashPassword($post['password']);
            $user->name     = $post['name'];
            $user->phone    = $post['phone'];
            $user->uniNum   = $post['uniNum'];
            $user->save();
        }
        else
            $error = "یکی از فیلد های مهم در دیتابیس موجود است.";
      		
      		return view('admin.addUser',compact('error','id'));  
    }

    public function showAll()
    {
        Auth::redirectToLogin('admin/login','admin');
    	$users = User::all();
    	return view('admin.manageUsers',compact('users'));

    }

    public function delete($id)
    {
        Auth::redirectToLogin('admin/login','admin');
    	User::findById($id)[0]->delete();
    	header('Location: '.url('admin/manage-users'));
    }

    public function login()
	{
        Auth::redirect('');
        $post = \Input::post();
        Auth::login($post['username'],$post['password']);
        header('Location: '.url('alert'));
    }

    public function home()
    {
        Auth::redirectToLogin('join');
        echo "logged in";
    }

    public function logout()
    {
        \App\Core\Auth::logout();
        header('Location: '.url());
    }
}