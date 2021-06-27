<?php

use App\Http\Controllers\AttentionController;
use App\Http\Controllers\AttentionInstrumentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\InstrumentTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSpecialityController;
use App\Models\Instrument_type;
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
Route::post('user/update/{id}',[UserController::class, 'update'])->name('user.update')->middleware(['auth']);
Route::get('user/edit/{id}',[UserController::class, 'edit'])->name('user.edit')->middleware(['auth']);

Route::get('user/permissions/{id}',[PermissionController::class, 'index'])->name('user.permissions');
Route::get('user/makeAdmin/{id}',[PermissionController::class, 'makeAdmin'])->name('user.makeAdmin');
Route::get('user/makeNurse/{id}',[PermissionController::class, 'makeNurse'])->name('user.makeNurse');
Route::get('user/makePatient/{id}',[PermissionController::class, 'makePatient'])->name('user.makePatient');
Route::get('user/activatePermission/{id}',[PermissionController::class, 'activatePermission'])->name('user.activatePermission');
Route::get('user/desactivatePermission/{id}',[PermissionController::class, 'desactivatePermission'])->name('user.desactivatePermission');

Route::get('user/specialities/{id}',[UserSpecialityController::class, 'index'])->name('user.specialities')->middleware(['auth']);
Route::get('user/setSpeciality/{id}/{speciality}',[UserSpecialityController::class, 'setSpeciality'])->name('user.setSpeciality')->middleware(['auth']);
Route::get('user/activateSpeciality/{id}',[UserSpecialityController::class, 'activateSpeciality'])->name('user.activateSpeciality')->middleware(['auth']);
Route::get('user/desactivateSpeciality/{id}',[UserSpecialityController::class, 'desactivateSpeciality'])->name('user.desactivateSpeciality')->middleware(['auth']);

Route::get('sections/all',[SectionController::class, 'index'])->name('sections.all')->middleware(['auth']);
Route::post('sections/create',[SectionController::class, 'create'])->name('sections.create')->middleware(['auth']);
Route::get('sections/register',[SectionController::class, 'register'])->name('sections.register')->middleware(['auth']);
Route::get('sections/edit/{id}',[SectionController::class, 'edit'])->name('sections.edit')->middleware(['auth']);
Route::post('sections/update/{id}',[SectionController::class, 'update'])->name('sections.update')->middleware(['auth']);
Route::get('sections/activateSection/{id}',[SectionController::class, 'activateSection'])->name('sections.activateSection')->middleware(['auth']);
Route::get('sections/desactivateSection/{id}',[SectionController::class, 'desactivateSection'])->name('sections.desactivateSection')->middleware(['auth']);

Route::get('instrument',[InstrumentTypeController::class, 'index'])->name('instrument.all')->middleware(['auth']);
Route::post('instrument/create',[InstrumentTypeController::class, 'create'])->name('instrument.create')->middleware(['auth']);
Route::get('instrument/activate/{id}',[InstrumentTypeController::class, 'activate'])->name('instrument.activate')->middleware(['auth']);
Route::get('instrument/desactivate/{id}',[InstrumentTypeController::class, 'desactivate'])->name('instrument.desactivate')->middleware(['auth']);
Route::post('instrument/update/{id}',[InstrumentTypeController::class, 'update'])->name('instrument.update')->middleware(['auth']);

Route::get('instruments/all',[InstrumentController::class, 'index'])->name('instruments.eachOne')->middleware(['auth']);
Route::post('instruments/create',[InstrumentController::class, 'create'])->name('instruments.createOne')->middleware(['auth']);
Route::get('instruments/activate/{id}',[InstrumentController::class, 'activate'])->name('instruments.activateOne')->middleware(['auth']);
Route::get('instruments/desactivate/{id}',[InstrumentController::class, 'desactivate'])->name('instruments.desactivateOne')->middleware(['auth']);
Route::get('instruments/edit/{id}',[InstrumentController::class, 'edit'])->name('instruments.editOne')->middleware(['auth']);
Route::post('instruments/update/{id}',[InstrumentController::class, 'update'])->name('instruments.updateOne')->middleware(['auth']);

Route::get('speciality/all',[SpecialityController::class, 'index'])->name('speciality.all')->middleware(['auth']);
Route::post('speciality/create',[SpecialityController::class, 'create'])->name('speciality.create')->middleware(['auth']);
Route::get('speciality/activate/{id}',[SpecialityController::class, 'activate'])->name('speciality.activate')->middleware(['auth']);
Route::get('speciality/desactivate/{id}',[SpecialityController::class, 'desactivate'])->name('speciality.desactivate')->middleware(['auth']);
Route::post('speciality/update/{id}',[SpecialityController::class, 'update'])->name('speciality.update')->middleware(['auth']);

Route::get('service/all',[ServiceController::class, 'index'])->name('service.all')->middleware(['auth']);
Route::post('service/create',[ServiceController::class, 'create'])->name('service.create')->middleware(['auth']);
Route::get('service/activate/{id}',[ServiceController::class, 'activate'])->name('service.activate')->middleware(['auth']);
Route::get('service/desactivate/{id}',[ServiceController::class, 'desactivate'])->name('service.desactivate')->middleware(['auth']);
Route::post('service/update/{id}',[ServiceController::class, 'update'])->name('service.update')->middleware(['auth']);

Route::get('reservation/all',[ReservationController::class, 'index'])->name('reservation.all')->middleware(['auth']);
Route::get('reservation/myReservations/{id}',[ReservationController::class, 'myReservations'])->name('reservation.myReservations')->middleware(['auth']);
Route::get('reservation/register/{id}',[ReservationController::class, 'register'])->name('reservation.register')->middleware(['auth']);
Route::post('reservation/create',[ReservationController::class, 'create'])->name('reservation.create')->middleware(['auth']);
Route::get('reservation/activate/{id}',[ReservationController::class, 'activate'])->name('reservation.activate')->middleware(['auth']);
Route::get('reservation/desactivate/{id}',[ReservationController::class, 'desactivate'])->name('reservation.desactivate')->middleware(['auth']);
Route::post('reservation/update/{id}',[ReservationController::class, 'update'])->name('reservation.update')->middleware(['auth']);
// Route::get('reservation/edit/{id}',[ReservationController::class, 'edit'])->name('reservation.edit')->middleware(['auth']);
Route::get('reservation/searchedReservations',[ReservationController::class, 'searched'])->name('reservation.dateSearched')->middleware(['auth']);
Route::get('reservation/nowReservations',[ReservationController::class, 'nowReservations'])->name('reservation.nowReservations')->middleware(['auth']);
Route::get('reservation/futureReservations',[ReservationController::class, 'futureReservations'])->name('reservation.futureReservations')->middleware(['auth']);
Route::get('reservation/pastReservations',[ReservationController::class, 'pastReservations'])->name('reservation.pastReservations')->middleware(['auth']);
Route::get('reservation/delete/{id}',[ReservationController::class, 'delete'])->name('reservation.delete')->middleware(['auth']);

Route::post('schedule/create',[ScheduleController::class, 'create'])->name('schedule.create')->middleware(['auth']);
Route::get('schedule/mySchedule/{id}',[ScheduleController::class, 'mySchedule'])->name('schedule.mySchedule')->middleware(['auth']);
Route::get('schedule/down/{id}',[ScheduleController::class, 'down'])->name('schedule.down')->middleware(['auth']);

Route::get('attention/all',[AttentionController::class, 'index'])->name('attention.index')->middleware(['auth']);
Route::get('attention/attention/{id}',[AttentionController::class, 'attention'])->name('attention.attention')->middleware(['auth']);
Route::post('attention/create',[AttentionController::class, 'create'])->name('attention.create')->middleware(['auth']);
Route::post('attention/update/{id}',[AttentionController::class, 'update'])->name('attention.update')->middleware(['auth']);

Route::get('attention/instruments/{id}',[AttentionInstrumentController::class, 'index'])->name('attention_instrument.index')->middleware(['auth']);
Route::post('attention/instruments/create',[AttentionInstrumentController::class, 'create'])->name('attention_instrument.create')->middleware(['auth']);
Route::post('attention/instruments/update/{id}',[AttentionInstrumentController::class, 'update'])->name('attention_instrument.update')->middleware(['auth']);
