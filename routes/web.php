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
Route::get('training_record/{id}/mypage', 'TrainingRecordController@myPage')->name('training_record.mypage');
Route::get('training_record/{id}/otherpage', 'TrainingRecordController@otherPage')->name('training_record.otherpage');
Route::get('training_record/{id}/detail', 'TrainingRecordController@detail')->name('training_record.detail');
Route::resource('training_record', TrainingRecordController::class);

Route::resource('weight_record', WeightRecordController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
