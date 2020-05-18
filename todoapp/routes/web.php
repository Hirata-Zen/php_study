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

//===ここから追加===
//①リスト一覧画面
Route::get('/','ListingsController@index');

//②リスト新規画面
Route::get('/new', 'ListingsController@new')->name('new');

//③リスト新規作成処理 

Route::post('/listings','ListingsController@store');

//リスト編集画面表示
Route::get('/listingsedit/{listing_id}','ListingsController@edit');

//リスト更新ボタン
Route::post('/listing/edit','ListingsController@update');

//リスト削除ボタン
Route::get('/listingsdelete/{listing_id}','ListingsController@destroy');

//カードの追加ボタン
Route::get('/listing/{listing_id}/card/new','CardsController@new');

//カード作成処理ボタン
Route::post('/listing/{listing_id}/card','CardsController@store');

//カード詳細画面
Route::get('/listing/{listing_id}/card/{card_id}','CardsController@show');

//カード編集画面
Route::post('/listing/{listing_id}/cardsedit/{card_id}','CardsController@edit');

//カード更新ボタン
Route::post('/listing/{listing_id}/edit','CardsController@update');

//カード削除ボタン
Route::get('/listing/{listing_id}/cardsdelete/{card_id}','CardsController@destroy');
//===ここまで追加===

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
