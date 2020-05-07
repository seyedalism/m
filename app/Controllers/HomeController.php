<?php use App\Core\Controller;

use App\Models\{User,Leage,leage_question,Question,user_leage,Book};
use App\Core\{Auth};

class HomeController extends Controller
{
    public function home()
    {
        //all
        $norms = null;
        $all = '<ol>';
        $users = User::all();
        foreach ($users as $user)
        {
            $uls = user_leage::findByUserid($user->id,'userid|ASC');
            $norms[$user->name] = 0;
            foreach ($uls as $ul)
                $norms[$user->name] += $ul->norm;
            if($norms[$user->name] == 0)
                unset($norms[$user->name]);
        }
        arsort($norms);
        foreach ($norms as $name => $norm)
        {
            $all .= '<li>'.$name.'</li>';
        }
        $all .= '</ol>';

        // last
        $last = '<ol>';
        $u_l = user_leage::where('leageid','>','0','leageid|DESC')[0];
        $u_l = user_leage::findByLeageid($u_l->leageid,'norm|DESC');
        if (!empty($u_l))
        {
            foreach ($u_l as $ul)
            {
                $user = User::findById($ul->userid)[0];
                $last .= '<li>'.$user->name.'</li>';
            }

        }

        $last .= '</ol>';

        $book = Book::all()[0]; 
        
        return view('home',compact('last','all','book','loggedIn'));
    }

    public function home2()
    {
        //all
        $norms = null;
        $all = '<ol>';
        $users = User::all();
        foreach ($users as $user)
        {
            $uls = user_leage::findByUserid($user->id,'userid|ASC');
            $norms[$user->name] = 0;
            foreach ($uls as $ul)
                $norms[$user->name] += $ul->norm;
            if($norms[$user->name] == 0)
                unset($norms[$user->name]);
        }
        arsort($norms);
        foreach ($norms as $name => $norm)
        {
            $all .= '<li>'.$name.'</li>';
        }
        $all .= '</ol>';

        // last
        $last = '<ol>';
        $u_l = user_leage::where('leageid','>','0','leageid|DESC')[0];
        $u_l = user_leage::findByLeageid($u_l->leageid,'norm|DESC');
        if (!empty($u_l))
        {
            foreach ($u_l as $ul)
            {
                $user = User::findById($ul->userid)[0];
                $last .= '<li>'.$user->name.'</li>';
            }

        }

        $last .= '</ol>';

        $book = Book::all()[0]; 

        $loggedIn = Auth::check();

        return view('home',compact('last','all','book','loggedIn'));
    }
}