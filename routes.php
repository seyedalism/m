<?php use App\Core\Router;

Router::get('/','HomeController@home');

Router::get('alert','HomeController@home2');

Router::post('login','UserController@login');

Router::get('logout','UserController@logout');

//quiz
Router::get('quiz','QuizController@show');

Router::post('quiz/done','QuizController@done');


//manage-leages
Router::get('admin/add-question/{id}','LeageController@showQuestionForm');

Router::put('admin/add-question/{id}','LeageController@addQuestion');

Router::get('admin/manage-leages','LeageController@show');

Router::put('admin/manage-leages','LeageController@add');

Router::get('admin/delete-leage/{id}','LeageController@delete');

//add user
Router::get('admin/add-user/{?id}','UserController@show');

Router::get('admin/delete-user/{id}','UserController@delete');

Router::put('admin/add-user/{?id}','UserController@register');

Router::get('admin/manage-users','UserController@showAll');

//admin login 
Router::get('admin','AdminController@home');

Router::get('admin/login','AdminController@loginForm');

Router::post('admin/login','AdminController@login');

Router::get('admin/logout','AdminController@logout');

//book
Router::get('admin/book','LeageController@showBook');

Router::post('admin/book','LeageController@addBook');

//truncate
Router::get('admin/truncate','LeageController@truncate');

Router::get('test',function(){
    echo time();
});