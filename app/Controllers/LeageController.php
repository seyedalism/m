<?php use App\Core\Controller;

    use App\Models\{User,Leage,leage_question,Question,Book,user_leage};
use App\Core\{Auth};

class LeageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::redirectToLogin('admin/login','admin');
    }

	public function show()
    {
        $leages = Leage::all();
        return view('admin.manageLeages',compact('leages'));
    }

    public function add()
    {
        $post = \Input::post();

        $start = explode('T',$post['start']);
        $sDate = explode('-',$start[0]);
        $sTime = explode(':',$start[1]);

        $end   = $post['end'];
        
        $start = jmktime($sTime[0],$sTime[1],0,$sDate[1],$sDate[2],$sDate[0]);
        $end = jmktime($sTime[0],$sTime[1] + $end,0,$sDate[1],$sDate[2],$sDate[0]);

        $leage = new Leage;
        $leage->name  = $post['name'];
        $leage->start = $start;
        $leage->end   = $end;
        $leage->save();

        header('Location:'.url('admin/manage-leages'));
    }

    public function delete($id)
    {
        $leage = Leage::findById($id)[0];
        $qs = leage_question::findByLid($id,'lid|ASC');
        $leage->delete();
        foreach ($qs as $q) {
            Question::findById($q->qid)[0]->delete();
            $q->delete('qid');
        }

        header('Location:'.url('admin/manage-leages'));
    }

    public function showQuestionForm($id)
    {
        
        return view('admin.addQuestion',compact('id'));
    }

    public function addQuestion($id)
	{
        $post = \Input::post();
        $quest = new Question;
        $quest->question = $post['question']; 
        $quest->one      = $post['one']; 
        $quest->tow      = $post['tow']; 
        $quest->three    = $post['three']; 
        $quest->four     = $post['four']; 
        $quest->answer   = $post['answer']; 
        $quest->point    = $post['point']; 
        $quest->save();
        $quest = Question::findByQuestion($post['question'])[0];

        $t = new leage_question;
        $t->qid = $quest->id;
        $t->lid = $id;
        $t->save();

        return view('admin.addQuestion',compact('id'));
    }

    //book
    public function showBook()
    {
        return view('admin.book');
    }

    public function addBook()
    {
        $post = \Input::post();
        $book = Book::all()[0];
        $book->name = $post['name'];
        $book->desc = $post['desc'];
        $book->save();
        header('Location: '.url('admin/book'));
    }

    public function truncate()
    {
        Leage::truncate();
        leage_question::truncate();
        user_leage::truncate();
        Question::truncate();
        header('Location: '.url('admin'));
    }
}