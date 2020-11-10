<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//科目編集ページ
Route::get('/subjects/{id}/edit', 'SubjectController@showEditForm')->name('subjects.edit');
//科目編集フォーム
Route::post('/subjects/{id}/edit', 'SubjectController@edit');

//課題作成ページ
Route::get('/subjects/{id}/report/create', 'ReportController@showCreateForm')->name('reports.create');
//課題作成フォーム
Route::post('/subjects/{id}/report/create', 'ReportController@create');
//課題編集ページ
Route::get('/subjects/{id}/report/{report_id}/edit', 'ReportController@showEditForm')->name('reports.edit');
//課題編集フォーム
Route::post('/subjects/{id}/report/{report_id}/edit', 'ReportController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
