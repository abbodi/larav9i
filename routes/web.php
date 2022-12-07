<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\StudentController;



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
})->name('aa');

Route::get('essai1/', function() {
return view('vue');
})->name('bb');

Route::get('/user/{name?}', function($name=NULL) {
    
    return $name;
    })->where('name','[A-Za-z]+');


Route::get('home/{name?}', [HomeController::class,'index']);

// ------------------------------------------------

Route::get('ajouter', [StudentController::class,'add']);
Route::get('affiche', [StudentController::class,'voir']);
Route::get('allstudents', [StudentController::class,'all_student_show']);
// ------------------------------------------------

Route::get('hm', [StudyController::class,'index'])->name('home');
Route::post('store', [StudyController::class,'store'])->name('store');

Route::get('edit/{id}', [StudyController::class,'edit'])->name('edit');
Route::post('update/{id}', [StudyController::class,'update'])->name('update');
Route::get('delete/{id}', [StudyController::class,'delete'])->name('delete');

Route::get('send', [MailController::class, 'send_email']);

Route::get('enver', [FormController::class, 'form']);
Route::post('enver_submit', [FormController::class, 'form_submit'])->name('form');