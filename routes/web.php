<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminAuth;
use App\Http\Controllers\student\studentAuth;
use App\Http\Middleware\Authentication;
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
    return view('login');
});

//login the admin
Route::post('login',[adminAuth::class,'login']);

//student functionality


Route::middleware([Authentication::class])->group(function () {
    Route::get('/student/list',[studentAuth::class,'list']);
    Route::view('/student/add','student.add');
    Route::post('/student/submit',[studentAuth::class,'submit']);
    Route::get('student/delete/{id}',[studentAuth::class,'delete']);
    Route::get('student/edit/{id}',[studentAuth::class,'edit']);
    Route::post('student/update/{id}',[studentAuth::class,'update']);

});


Route::get('logout', function () {
    session()->forget('adminId');
    session()->forget('adminName');
    session()->flash('msg','Logout Successfully');
    return redirect('/');
});
