<?php

use Illuminate\Support\Facades\Route;

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

//課題一覧ページ
Route::get('/subject/{id}/reports', 'ReportController@index')->name('reports.index');

//科目作成ページ
Route::get('/subjects/create', 'SubjectController@showCreateFrom')->name('subjects.create');
//科目作成フォーム
Route::post('/subjects/create', 'SubjectController@create');

//課題作成ページ
Route::get('subjects/{id}/report/create', 'ReportController@showCreateForm')->name('reports.create');
//課題作成フォーム
Route::post('subjects/{id}/report/create', 'ReportController@create');
