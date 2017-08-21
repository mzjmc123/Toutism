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
    return view('image.index');
});

//Route::post('/file','FileController@upload');
//admin/upload

Route::get('admin/pwd','Admin\LoginController@pwd');
Route::get('/admin','Admin\LoginController@action_index');
Route::post('admin/login','Admin\LoginController@index');
Route::any('admin/register','Admin\LoginController@register');

//Route::any('admin/upload','Admin\CommentController@upload');

Route::group(['middleware'  => ['admins'],'prefix' => 'admin','namespace' => 'Admin'], function (){
    /**
     * user management
     */
    Route::post('/upload','CommentController@upload');
    Route::get('profile/{user_id}','LoginController@profile');
    Route::post('update/{user_id}','LoginController@update');
    Route::get('home','LoginController@home');
    Route::get('user/{username?}','LoginController@user');
    Route::post('user/adduser','LoginController@add_user');
    Route::get('exit','LoginController@exit');
    Route::get('index','LoginController@welcome');
    Route::post('status/{user_id}','LoginController@status');
    Route::post('state/{user_id}','LoginController@state');
    Route::get('count','LoginController@count');
    Route::get('user/user_group/{user_id}','LoginController@user_group');
    Route::post('user/group','LoginController@addgroup');
    /**
     * auth management
     */
    Route::get('auth/index/{group_name?}','AuthController@index');
    Route::post('auth/addgroup','AuthController@add_group');
    Route::post('auth/status/{group_id}','AuthController@status');
    Route::post('auth/state/{group_id}','AuthController@state');
    Route::get('auth/modify/{group_id}','AuthController@modify');
    Route::post('auth/ModifyForm/{group_id}','AuthController@modify_form');

    /**
     * customer
     */
    Route::get('customer/index/{customer_name?}','CustomerController@index');
    Route::post('customer/addcustomer','CustomerController@add_customer');
    Route::get('customer/modify/{customer_id}','CustomerController@modify');
    Route::post('customer/mymodify/{customer_id}','CustomerController@modify_form');
    Route::delete('customer/delete/{customer_id}','CustomerController@delete');

    /**
     * project
     */
    Route::get('project/index/{project_name?}','ProjectController@index');
    Route::get('project/add/{user_id}','ProjectController@add_project');
    Route::post('project/add','ProjectController@add');
    Route::get('project/modify/{project_id}/{user_name}','ProjectController@project_modify');
    Route::post('project/mofifyform/{project_id}','ProjectController@mofifyform');

    /**
     * business
     */
    Route::get('sales/index','BusinessController@index');

});

