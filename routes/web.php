<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\FormBController;



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

Route::get('/', [LoginController::class, 'register'])->name('register');

Route::controller(LoginController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


/*disebabkan guna user baru (admin) selain users, so keno applied (auth:admin)
instead of (auth) sahaja sebab dio nok cek users to be authenticated using the 'admin' guard.
cuz by default dio guno users :))*/
Route::middleware('auth:admin')->group(function () {
    // Route::get('dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('dashboard', [StaffController::class, 'totalStaff'])->name('dashboard.staff');
    // Route::get('dashboard', function () {
    //     dd('Route accessed!');
    // })->name('dashboard');
    Route::get('dashboard/addstaff', [StaffController::class, 'create'])->name('dashboard.addstaff');
    Route::post('dashboard/addstaff', [StaffController::class, 'store'])->name('staff.store');
    Route::get('dashboard/viewstaff', [StaffController::class, 'showStaff'])->name('dashboard.viewstaff');
    Route::delete('dashboard/deletestaff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
    Route::put('dashboard/staffupdatet/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::get('admin/profile', [LoginController::class, 'profile'])->name('admin.profile');
    Route::put('admin/profile/update/{id}', [LoginController::class, 'updateProfile'])->name('update.profile');
    Route::get('contact-us', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');

    Route::get('/users', [UserController::class, 'index'])->name('invite');
    Route::get('/users/invite', [UserController::class, 'invite_view'])->name('invite_view');
    Route::post('/users/invite', [UserController::class, 'process'])->name('process_invite');
    Route::get('/accept/{token}', [UsersController::class, 'accept'])->name('accept');

    Route::get('/users2', [UserController::class, 'index2'])->name('invite2');
    Route::get('/users/invite2', [UserController::class, 'invite_view2'])->name('invite_view2');
    Route::post('/users/invite2', [UserController::class, 'process2'])->name('process_invite2');

    Route::get('/formb', [FormBController::class, 'index'])->name('formb.index');
    Route::post('/submit-formb', [FormBController::class, 'submit'])->name('formb.submit');



 
 
    
});