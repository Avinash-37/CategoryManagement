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

Route::get('home',['uses'=>'AllCategoryController@listCategory']);

Route::get('category-home',['uses'=>'AllCategoryController@listCategory1']);

Route::post('add-category','AllCategoryController@addCategory');
Route::post('deletecategory/{id}','AllCategoryController@deletecategory');

Route::post('add-sub-category','AllCategoryController@addSubCategory');

Route::post('sub-category-list','AllCategoryController@SubCategoryList');