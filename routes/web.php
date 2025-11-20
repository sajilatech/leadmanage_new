<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

Route::get('/usercreate', [UserController::class, 'create'])->name('usercreate');
Route::post('/adduser', [UserController::class, 'add'])->name('adduser');

 Route::get('/userlist', [UserController::class, 'index'])->name('users.list');
 Route::get('/leadlist', [LeadController::class, 'index'])->name('leads.list');

 Route::get('useredit/{id}', [UserController::class, 'edit'])->name('user.edit');


  Route::Post('/updateUser', [UserController::class, 'update'])->name('updateUser');

   Route::get('/userstatus/{id}/{status}', [UserController::class, 'status'])->name('user.status');
 Route::get('/userdrop/{id}', [UserController::class, 'drop'])->name('user.drop');

 Route::get('/leadcreate', [LeadController::class, 'create'])->name('leadcreate');
Route::post('/addlead', [LeadController::class, 'add'])->name('addlead');
