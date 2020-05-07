<?php use App\Core\Controller;

use App\Models\{User,Leage,leage_question,Question};
use App\Core\{Auth};

class AdminController extends Controller
{
    public function loginForm()
    {
       Auth::redirect('admin','admin');
       return view('admin.login');   
    } 

    public function login()
    {
        Auth::redirect('admin','admin');
        $post = \Input::post();
        $res = Auth::adminLogin($post['username'],$post['password']);
        header('Location: '.url('admin/login'));    
    } 

    public function logout()
    {
        Auth::logout('admin');
        header('Location: '.url('admin/login'));    
    }

    public function home()
    {
        Auth::redirectToLogin('admin/login','admin');
        return view('admin.home');
    }
}