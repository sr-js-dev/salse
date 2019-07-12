<?php

Route::get('/login', function () {
    return view('/auth/login');
});
Route::get('/verify/{token}', 'Controller@verify');



Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route :: get('/demorequest', [
    'uses' => 'RequestDemoController@create'
]);
Route :: post('/demorequest', [
    'uses' => 'RequestDemoController@store',
    'as' => 'request.store'
]);

Auth::routes();

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/home', function () {
    return view('frontend.home');
});
Route::get('/about-us', 'AboutUsController@index');
Route::get('/contact-us', 'ContactUsController@index');
Route::get('/privacy-policy', 'PrivacyPolicyController@index');

Route::get('/thankyou', 'ThankYouController@index')->name('thankyou');
Route::get('/welcome', 'WelcomeController@index')->name('welcomesales');


// Route::prefix('dashboard')->group(function (){
Route::group( [ 'prefix' => 'dashboard'  ,   'middleware' => 'auth'], function(){
    Route::middleware('emailverified')->group( function(){
        Route :: get('/', 'DashboardController@index');
        // Route :: get('/tasks/map', 'DashboardController@map');
        Route :: get('/mark/task_member/{id}', 'DashboardController@Mark_GetTaskMember');
        Route :: get('/mark/task/{id}', 'DashboardController@Mark_GetTask');

        Route :: get('/team', 'TeamController@index');       
        // Route :: get('/team/remove/{id}', 'TeamController@removeTeam');
        Route :: get('/team/{event}', 'TeamController@getTeamDetail');
        Route :: post('/team/update', 'TeamController@update');

        Route :: get('/accounts', 'AccountsController@index');
        Route :: get('/accounts/{accounts}', 'AccountsController@getAccountDetail');
        
       
        Route :: get('/services', 'ServicesController@index');
        Route :: get('/services/{service}', 'ServicesController@getServiceDetail');


        Route :: get('/tasks', 'TasksController@index');
       
        Route :: get('/calendar', 'CalendarController@index');
        Route :: get('/calendar/{event}', 'CalendarController@getEventDetail');

        Route :: get('/tasks/{task}', 'TasksController@getTaskDetail');
        Route :: post('/tasks/eventsave', 'TasksController@postTaskUpdate');
     
        Route :: get('/map', 'MapController@index');
        Route :: get('/map/task/{id}', 'MapController@Mark_GetTask');
        Route :: get('/map/task_member/{id}', 'MapController@Mark_GetTaskMember');
    
        Route :: get('/reporting', 'ReportingController@index');
    });
    
});
 

Route :: post('add-teammember', 'TeamController@store');
Route :: post('update-teammember', 'TeamController@update');
Route :: post('update-account', 'AccountsController@update');
Route :: post('update-service', 'ServicesController@update');
Route :: post('calendar', 'CalendarController@addEvent')->name('events.add');
Route :: post('add-task', 'TasksController@addTask');
Route :: post('update-task', 'TasksController@postTaskUpdate');
Route :: post('add-account', 'AccountsController@addAccount');
Route :: post('add-service', 'ServicesController@addService');
Route :: post('delete-team', 'TeamController@removeTeam');
Route :: post('delete-service', 'ServicesController@removeService');
Route :: post('delete-account', 'AccountsController@removeAccount');
Route :: post('delete-task', 'TasksController@removeTask');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
