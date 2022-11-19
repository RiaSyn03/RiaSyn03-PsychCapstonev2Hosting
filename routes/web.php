<?php

use illuminate\Support\Facades\Route;

Route::get('/', function () {
        return view('welcome');
    });

Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');

//Student Views

Route::get('/studentdash', function () {
    return view('admin.users.student.studentdash');
});

Route::get('/stdntappointment', function () {
    return view('admin.users.student.stdntappointment');
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

Route::get('/wellness', function () {
    return view('admin.users.student.wellness');
});

Route::get('/category', function () {
    return view('admin.users.student.category');
});


//Counselour Views

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

Route::get('/exams_history', function () {
    return view('admin.users.councilour.exams_history');
});

Route::get('/updateschedule', function () {
    return view('admin.users.councilour.updateschedule');
});


//Edited Gio / Admin Views
Route::get('/addstudent', function(){
    $course = App\Course::all();
    return view('admin.users.addstudent', ['course' => $course]);
});
Route::get('/addcouncilor', function(){
    return view('admin.users.addcouncilor');
});
Route::get('/addcourse', function(){
    $depts = App\Department::all();
    return view('admin.users.addcourse', ['depts' => $depts]);
});
Route::get('/course', function(){
    return view('admin.users.course');
});
Route::get('/department', function(){
    return view('admin.users.department');
});

Route::get('/dash', function(){
    return view('admin.users.dash');
});

Route::get('/manageappointments', function(){
    return view('admin.users.manageappointments');
});

Route::get('/updatequestion', function () {
    return view('admin.users.updatequestion');
});

Route::post('/addcouncilor','Admin\UserController@makecounselour')->name('addcouncilor');
Route::resource('course', CourseController::class);
Route::resource('/department', DepartmentController::class);
Route::resource('user', Admin\UserController::class);

//end



Auth::routes();

// Admin //
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
Route::get('/questions', 'Admin\QuestionController@index')->name('questions');
Route::post('/questions', 'Admin\QuestionController@create')->name('questions');
Route::delete('/question-delete/{id}', 'Admin\QuestionController@destroy');
Route::get('/manageappointments', 'Councilour\Appointmentlist@adminappointments')->name('manageappointments');
Route::put('/manageappointments-update/{id}', 'Councilour\Appointmentlist@adminupdate')->name('manageappointments-update');
Route::get('/updatequestion/{id}', 'Admin\QuestionController@edit')->name('updatequestion');
Route::put('/updatequestion-edit/{id}', 'Admin\QuestionController@update')->name('updatequestion-edit');
Auth::routes();

//Counselour//
// Route::resource('/questions','Councilour\QuestionController', ['except' => ['show', 'edit', 'update']]);
Route::get('/viewtime', 'Councilour\Appointmentlist@index')->name('viewtime');
// Route::post('/viewtime-accept/{id}', 'Councilour\Appointmentlist@update')->name('viewtime-accept');
Route::get('/change-status/{id}', 'Councilour\Appointmentlist@updatetime')->name('changestatus');
Route::get('/change-done/{id}', 'Councilour\Appointmentlist@done')->name('changedone');
Route::get('/change-resched/{id}', 'Councilour\Appointmentlist@resched')->name('resched');
Route::get('/viewquestions', 'Councilour\QuestionController@index')->name('viewquestions');
Route::post('/viewquestions', 'Councilour\QuestionController@create')->name('viewquestions');
Route::get('/myfinishappointments', 'Councilour\Appointmentlist@finishappointments')->name('myfinishappointments');
Route::post('/viewtime-email', 'Councilour\Appointmentlist@sendmail')->name('viewtime-email');
Route::get('/updateschedule/{id}', 'Councilour\Appointmentlist@getreschedid')->name('updateschedule');
Route::put('/updateschedule-edit/{id}', 'Councilour\Appointmentlist@updateresched')->name('updateschedule-edit');

//Student//
Route::post('/appointment_history', 'Councilour\Appointmentlist@store')->name('appointment_history');
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
Route::get('/admin/users/student/questionaire', 'StudentquestionaireController@index')->name('questionaire');
Route::delete('/appointment-delete/{id}', 'Councilour\Appointmentlist@destroy');
Route::delete('/completed-delete/{id}', 'Councilour\Appointmentlist@destroycompleted');
























