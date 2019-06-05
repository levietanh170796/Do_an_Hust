<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('user_profiles', 'UserProfilesController')->only(['update']);
    Route::get('user_profiles', 'UserProfilesController@edit')->name('user_profiles.edit');
    Route::resource('roles', 'RolesController');
    Route::resource('levels', 'LevelsController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('contest_rounds', 'ContestRoundsController');
    Route::resource('questions', 'QuestionsController');
    Route::resource('results', 'ResultsController')->only(['index']);
    Route::resource('users', 'UsersController')->except(['store', 'create']);
    Route::resource('contest_results', 'ContestResultsController')->only(['index', 'show']);
    Route::get('/my_results', 'ContestResultsController@my_results')->name('my_results');
    Route::get('/leader_boards', 'ContestResultsController@leader_boards')->name('leader_boards');

    Route::post('/submit', 'ResultsController@submit')->name('submit');
    Route::get('/do_tests', 'ContestResultsController@do_tests')->name('do_tests');
    Route::get('/rounds-by-subject', 'ContestRoundsController@rounds_by_subject')->name('rounds_by_subject');

    Route::get('/changePassword','HomeController@showChangePasswordForm');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
    
    // Route::resource('question_options', 'QuestionOptionsController')->except(['create', 'store', 'destroy']);
});
