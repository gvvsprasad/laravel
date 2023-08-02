<?php

use App\Http\Controllers\UserHobbiesController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user-hobbies', [UserHobbiesController::class, 'show'])->name('user-hobbies.show');
Route::get('user-hobbies/edit/{id}', [UserHobbiesController::class, 'edit'])->name('user-hobbies.edit');
Route::put('user-hobbies/edit/{id}', [UserHobbiesController::class, 'update'])->name('user-hobbies.edit-store');
Route::delete('user-hobbies/delete/{id}', [UserHobbiesController::class, 'show'])->name('user-hobbies.delete'); 


//git remote set-url origin https://<USERNAME>:<PASSWORD>@github.com/path/to/repo.git
//git config --global credential.helper store