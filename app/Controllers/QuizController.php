<?php use App\Core\Controller;

use App\Models\{User,Leage,leage_question,Question,user_leage};
use App\Core\{Auth};

class QuizController extends Controller
{
     public function __construct()
    {
        parent::__construct();
        Auth::redirectToLogin('');
    }

	public function show()
    {
    	$leage = $this->findLeage();
    	$quests = null;
    	if(!empty($leage))
    	{
    		$quests = $this->findQuestions($leage->id);
    	}
        return view('quiz',compact('leage','quests'));
    }

	public function done()
    {
    	$post  = \Input::post();
    	$user  = Auth::returnUser();
    	$leage = $this->findLeage();
    	if(!empty($leage))
    	{
    		$u_l = new user_leage;
    		if(!$this->isThere($user->id,$leage->id))
    		{
	    		$u_l->userid  = $user->id;
	    		$u_l->leageid = $leage->id;
	    		$u_l->norm = 0;
	    		$quests = $this->findQuestions($leage->id);
	    		foreach ($quests as $q) {
	    			if(isset($post['question'.$q->id]) && $post['question'.$q->id] == $q->answer)
	    			{
	    				$u_l->norm += $q->point;
	    			}
                }
                $u_l->save();
	    		$norm = $u_l->norm;
                return view('quizMessage',compact('norm'));
            }
        }
        return view('quizError');
    }

    public function findQuestions($id)
    {
    	$qs = leage_question::findByLid($id,'lid|ASC');
    	$quests = null;
		if(!empty($qs))
		{
			foreach ($qs as $q) 
			{
				$quests[] = Question::findById($q->qid)[0];
			}
		}
		return $quests;
    }

    public function findLeage()
    {
    	$leages = Leage::all();
    	foreach ($leages as $leage) {
    		if($leage->start <= time())
			if($leage->end >= time())
			{
				return $leage;
			}
    	}
    	return null;
    }

    public function isThere($userId,$leageId)
    {
    	$u_l = user_leage::findByUserid($userId,'userid|ASC');
    	if(!empty($u_l))
    	{
    	    foreach ($u_l as $ul)
            {
                if($ul->leageid == $leageId)
                {
                    return true;
                }
            }
    	}
    	return false;
    }

}