<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/loggedin', [LoginController::class, 'doLogin'])->name('do_login');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/registration', [RegisterController::class, 'registration'])->name('registration');

Route::get('/dashboard', [AdminUserController::class, 'dashboard'])->name('dashboard');

Route::get('/permission', [PermissionController::class, 'index'])->name('permission.list');
Route::get('/permission-create', [PermissionController::class, 'create'])->name('permission.create');
Route::post('/permission-save', [PermissionController::class, 'store'])->name('permission.save');
Route::get('/permission-edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
Route::get('/permission-delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');


Route::get('/roles', [RoleController::class, 'index'])->name('role.list');
Route::get('/create-role', [RoleController::class, 'create'])->name('role.create');
Route::post('/save-role', [RoleController::class, 'store'])->name('role.save');
Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::get('/delete-role/{id}', [RoleController::class, 'delete'])->name('role.delete');


Route::get('/users', [AdminUserController::class, 'index'])->name('users.list');
Route::get('/create-user', [AdminUserController::class, 'create'])->name('users.create');
Route::post('/save-user', [AdminUserController::class, 'store'])->name('users.save');
Route::get('/edit-user/{id}', [AdminUserController::class, 'edit'])->name('users.edit');
Route::get('/delete-user/{id}', [AdminUserController::class, 'delete'])->name('users.delete');