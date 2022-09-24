<?php

Route::get('/', function () {
        return view('welcome');
    });
Route::get('/adminregister', function () {
        return view('admin.users.adminregister');
    });

Route::get('/unregistered', function () {
        return view('admin.users.student.unregistered');
    });

Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');

Route::get('/councilourdash', function () {
    return view('admin.users.councilour.councilour');
});

Route::get('/studentdash', function () {
    return view('admin.users.student.studentdash');
});

Route::get('/wellness', function () {
    return view('admin.users.student.wellness');
});

Route::get('/stdntappointment', function () {
    return view('admin.users.student.stdntappointment');
});

Route::get('/stdntbook', function () {
    return view('admin.users.student.stdntbook');
});

Route::get('/stdntbooked', function () {
    return view('admin.users.student.stdntbooked');
});

Route::get('/allstdntbooked.', function () {
    return view('admin.users.student.allstdntbooked');
});

Route::get('/stdnttime', function () {
    return view('admin.users.student.stdnttime');
});

Route::get('/questionaire', function () {
    return view('admin.users.student.questionaire');
});

Route::get('/stress_exam', function () {
    return view('admin.users.student.stress_exam');
});
Route::get('/learner_exam', function () {
    return view('admin.users.student.learner_exam');
});
Route::get('/personality_exam', function () {
    return view('admin.users.student.personality_exam');
});

Route::get('/listofstudent', function () {
    return view('admin.users.councilour.listofstudent');
});

Route::get('/councilourdash', function () {
    return view('admin.users.councilour.councilourdash');
});
Route::get('/create', function () {
    return view('admin.users.councilour.questions.create');
});
Route::get('/viewquestions', function () {
    return view('admin.users.councilour.questions.viewquestions');
});
Route::get('/editquestionaire', function () {
    return view('admin.users.councilour.questions.editquestion');
});

Route::get('/viewtime', function () {
    return view('admin.users.councilour.viewtime');
});

Route::get('/listofapprovedappointments', function () {
    return view('admin.users.councilour.listofapprovedappointments');
});

Route::get('/exams_history', function () {
    return view('admin.users.councilour.exams_history');
});


Auth::routes();

// Admin //
Route::post('/index','Admin\UserController@create')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account/activate/{token}', 'AccountController@activate');
Route::get('/index', function(){
    return view('admin.users');
}) ->middleware(['auth', 'auth.admin']);
Route::get('/admin/users', 'LiveSearch@index');
Route::post('/admin/users/index/action', 'LiveSearch@action')->name('admin.users.index.action');
Route::post('/admin/users/student/stdntbook', 'BookingController@index')->name('admin.users.student.stdntbook');
Route::namespace('Admin') ->prefix('admin')->middleware(['auth', 'auth.admin']) ->name('admin.')->group(function(){
Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
Route::get('/impersonate/user/{id}', 'ImpersonateController@index')->name('impersonate');
});
Route::get('/admin/impersonate/destroy', 'Admin\ImpersonateController@destroy')->name('admin.impersonate.destroy');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/index','HomeController@adminregister')->name('adminregister');

//Counselour//
Route::resource('/questions','Councilour\QuestionController', ['except' => ['show', 'edit', 'update']]);
Route::resource('/listofstudent', 'Councilour\ListofStudents', ['except' => ['show', 'create', 'store']]);
Route::get('/viewtime', 'Councilour\Appointmentlist@index')->name('viewtime');
Route::post('/viewtime', 'Councilour\Appointmentlist@done')->name('viewtime');
Route::get('/viewquestions', 'Councilour\QuestionController@index')->name('viewquestions');
Route::get('/listofapprovedappointments', 'Myapprovedappointments@index')->name('listofapprovedappointments');
Route::get('/change-status/{id}', 'Councilour\Appointmentlist@status')->name('changestatus');
Route::post('/viewquestions', 'Councilour\QuestionController@create')->name('viewquestions');
Route::delete('/question-delete/{id}', 'Councilour\QuestionController@destroy');
Route::get('/myfinishappointments', 'Councilour\Appointmentlist@finishappointments')->name('myfinishappointments');
Route::get('/home', 'Councilour\Appointmentlist@percentage')->name('home');

//Student//
Route::post('/stdntappointment', 'Councilour\Appointmentlist@store')->name('stdntappointment');
Route::get('/appointment_history', 'Councilour\Appointmentlist@show')->name('appointment_history');
Route::get('/stress_exam', 'Councilour\QuestionController@stress')->name('stress_exam');
Route::post('/stress_exam', 'Councilour\QuestionController@store')->name('stress_exam');
Route::get('/personality_exam', 'Councilour\QuestionController@personality')->name('personality_exam');
Route::post('/personality_exam', 'Councilour\QuestionController@pstore')->name('personality_exam');
Route::get('/exams_history', 'Councilour\QuestionController@showexam')->name('exams_history');
Route::get('/learner_exam', 'Councilour\QuestionController@learner')->name('learner_exam');
Route::post('/learner_exam', 'Councilour\QuestionController@lstore')->name('learner_exam');
Route::get('/exam_result', 'Councilour\QuestionController@result')->name('exam_result');
Route::post('/exam_result', 'Councilour\QuestionController@store')->name('exam_result');
Route::post('/stdnttime', 'Councilour\Appointmentlist@store',['except'=>['show','create','store']])->name('stdnttime');
Route::get('/admin/users/student/questionaire', 'StudentquestionaireController@index')->name('questionaire');
Route::delete('/appointment-delete/{id}', 'Councilour\Appointmentlist@destroy');























