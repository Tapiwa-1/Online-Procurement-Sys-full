<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\logController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\ProfilePictureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Request\PendingRequestController;
use App\Http\Controllers\Request\RequestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/create-account', function () {
    return Inertia::render('CreateAccount', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('createAccount');
Route::get('/certificate-download', function () {
    return Inertia::render('CertificateDownload', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('certificateDownload');

Route::get('/get-certificate', function () {
    return Inertia::render('GetCertificate', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('getCertificate');

Route::get('/tender-participation', function () {
    return Inertia::render('TenderParticipation', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('tenderParticipation');


Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth')->name('dashboard');
Route::middleware([ 'role:admin'])->name('admin.')->prefix('admin')->group(function () {

    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permission');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.role');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/roles', [UsersController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UsersController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UsersController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UsersController::class, 'revokePermission'])->name('users.permissions.revoke');

    Route::get('/logs',[logController::class,'index'])->name('logs.index');
    Route::get('/logs/destroy',[logController::class,'destroy'])->name('logs.destroy');
});

//App Features Routes

Route::resource('/request', RequestController::class);
Route::get('/pending-requests',[PendingRequestController::class,'index'])->name('pendingRequest');
Route::patch('/approve-request/{id}',[PendingRequestController::class,'approveRequest'])->name('approveRequest');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile-picture', [ProfilePictureController::class, 'update'])->name('profilePicture.update');
});

require __DIR__.'/auth.php';
