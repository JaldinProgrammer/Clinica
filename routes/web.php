<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'welcome');
Route::view('login', 'login')->name('login');

Route::post('login',[LoginController::class, 'login']);
Route::post('logout',[LoginController::class, 'logout']);
Route::post('user/create',[LoginController::class, 'create'])->name('user.create');

Route::get('user/locations',[LocationController::class, 'index'])->name('user.locations');
Route::get('user/register-location',[LocationController::class, 'create'])->name('user.locations.register');
Route::post('user/storage-location',[LocationController::class, 'store'])->name('user.locations.create');
Route::get('user/show-map/{id}',[LocationController::class, 'showMap'])->name('user.locations.showMap');
Route::get('user/perfil/locations/{id}',[LocationController::class, 'userLocations'])->name('user.perfil.locations');

Route::get('user/register',[UserController::class, 'create'])->name('user.register');
Route::get('user/all',[UserController::class, 'index'])->name('user.all');
Route::get('user/perfil',[UserController::class, 'perfil'])->name('user.perfil')->middleware(['auth']);
Route::get('user/admins',[UserController::class, 'showAdmins'])->name('showAdmins')->middleware(['auth']);
Route::get('user/nurses',[UserController::class, 'showNurses'])->name('showNurses')->middleware(['auth']);
Route::get('user/patients',[UserController::class, 'showPatients'])->name('showPatients')->middleware(['auth']);

Route::get('user/permissions/{id}',[PermissionController::class, 'index'])->name('user.permissions');
Route::get('user/makeAdmin/{id}',[PermissionController::class, 'makeAdmin'])->name('user.makeAdmin');
Route::get('user/makeNurse/{id}',[PermissionController::class, 'makeNurse'])->name('user.makeNurse');
Route::get('user/makePatient/{id}',[PermissionController::class, 'makePatient'])->name('user.makePatient');
Route::get('user/activatePermission/{id}',[PermissionController::class, 'activatePermission'])->name('user.activatePermission');
Route::get('user/desactivatePermission/{id}',[PermissionController::class, 'desactivatePermission'])->name('user.desactivatePermission');

