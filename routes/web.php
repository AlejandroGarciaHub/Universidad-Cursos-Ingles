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
    return view('home');
});


Route::group(['prefix'=>'admin','middleware' => 'auth'],function(){



  Route::group(['middleware' => 'admin'],function(){
    Route::resource('users','UsersController',[
      'only'=>['store','update']
    ]);
    Route::get('users/{id}/destroy',[
      'uses'=>'UsersController@destroy',
      'as'=> 'admin.users.destroy'
    ]);
    Route::get('users/{id}/edit', [
      'uses' => 'UsersController@edit',
      'as'=> 'users.edit'
    ]);
  });


    Route::get('users/create', [
      'uses' => 'UsersController@create',
      'as'=> 'users.create'
    ]);
    Route::get('users/index', [
      'uses' => 'UsersController@index',
      'as'=> 'users.index'
    ]);

    Route::resource('generations','GenerationsController');
    Route::get('generations/{id}/destroy',[
      'uses'=>'GenerationsController@destroy',
      'as'=> 'admin.generations.destroy'
    ]);

    Route::resource('careers','CareersController');
    Route::get('careers/{id}/destroy',[
      'uses'=>'CareersController@destroy',
      'as'=> 'admin.careers.destroy'
    ]);

    Route::resource('students','StudentsController');
    Route::get('students/{id}/destroy',[
      'uses'=>'StudentsController@destroy',
      'as'=> 'admin.students.destroy'
    ]);

    Route::resource('levels','LevelsController');
    Route::get('levels/{id}/destroy',[
      'uses'=>'LevelsController@destroy',
      'as'=> 'admin.levels.destroy'
    ]);

    Route::resource('teachers','TeachersController');
    Route::get('teachers/{id}/destroy',[
      'uses'=>'TeachersController@destroy',
      'as'=> 'admin.teachers.destroy'
    ]);

    Route::resource('groups','GroupsController');
    Route::get('groups/{id}/destroy',[
      'uses'=>'GroupsController@destroy',
      'as'=> 'admin.groups.destroy'
    ]);

    Route::resource('group_students','Group_StudentsController');
    Route::get('group_students/{id}/destroy',[
      'uses'=>'Group_StudentsController@destroy',
      'as'=> 'admin.group_students.destroy'
    ]);
    Route::get('group_students/create/{group}', [
      'uses' => 'Group_StudentsController@create',
      'as'=> 'admin.group_students.create'
    ]);
    Route::get('group_students/calificaciones/{group}', [
      'uses' => 'Group_StudentsController@calificaciones',
      'as'=> 'admin.group_students.calificaciones'
    ]);
    Route::get('group_students/pagos/{group}', [
      'uses' => 'Group_StudentsController@pagos',
      'as'=> 'admin.group_students.pagos'
    ]);
    Route::get('group_students/actualizar/{alumno_grupo}', [
      'uses' => 'Group_StudentsController@actualizar',
      'as'=> 'admin.group_students.actualizar'
    ]);

    Route::resource('aproved_levels','Aproved_LevelsController');
    Route::get('aproved_levels/{id}/destroy',[
      'uses'=>'Aproved_LevelsController@destroy',
      'as'=> 'admin.aproved_levels.destroy'
    ]);
    Route::get('aproved_levels/create/{group_student}',[
      'uses'=>'Aproved_LevelsController@create',
      'as'=> 'admin.aproved_levels.create'
    ]);

    Route::resource('payments','PaymentsController');
    Route::get('payments/{id}/destroy',[
      'uses'=>'PaymentsController@destroy',
      'as'=> 'admin.payments.destroy'
    ]);

    Route::get('home', 'HomeController@index')->name('home');

});

Route::get('generations/{year}',[
  'uses'=> 'StudentsController@searchGeneration',
  'as'=>'students.search.generation'
]);
Route::get('generations',[
  'uses'=> 'StudentsController@searchGenerationAll',
  'as'=>'students.todos'
]);

Auth::routes();
