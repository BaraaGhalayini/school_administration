<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;


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

Route::group(
    [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'] 
    ], function(){


        Route::get('/', function () {
            return view('dashboard');
        })->name('Home');


        Route::view('showclasses', 'livewire.ShowClasses' );

        Route::view('grades', 'livewire.grades.grades')->name('Grades');

        Route::view('classrooms', 'livewire.classrooms.classrooms')->name('Classrooms');


        Route::get('/testing', function () {

            // $users  =  loop::all() ;
            // $users  =  User::all() ;
            // $users = DB::table('users')->get();
            return print($users);
        });

        
});


// Route::get('/{page}',[AdminController::class, 'index']);