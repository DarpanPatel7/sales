<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\CustomerSourceController;
use App\Http\Controllers\CustomerBusinessController;

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
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

// Route::middleware('auth')->group(function () {
    //Dashboard
    Route::resource('/dashboard', DashboardController::class);

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Employees
    Route::resource('employees', EmployeeController::class);
    Route::get('employees.getEmployees', [EmployeeController::class, 'getEmployees'])->name('employees.getEmployees');

    //Role & Permissions
    Route::resource('roles', RoleController::class);
    Route::get('roles.getRole/{id}', [RoleController::class, 'getRole'])->name('roles.getRole');
    Route::patch('roles.updateRole/{id}', [RoleController::class, 'updateRole'])->name('roles.updateRole');
    Route::resource('permissions', PermissionController::class);

    //Designations
    Route::resource('designations', DesignationController::class);

    //Menu
    Route::resource('menus', MenuController::class);

    //Customer
    Route::resource('customer-sources', CustomerSourceController::class);

    //Customer
    Route::resource('customer-businesses', CustomerBusinessController::class);

    //Admin Settings
    // Route::resource('admin-settings', AdminSettingController::class);
    // Route::resource('admin-settings', AdminSettingController::class);
    Route::get('admin-settings', [AdminSettingController::class, 'index'])->name('admin-settings');
    Route::get('admin-settings.getVerticalMenu', [AdminSettingController::class, 'getVerticalMenu'])->name('roles.getVerticalMenu');
    Route::get('admin-settings.saveVerticalMenu', [AdminSettingController::class, 'saveVerticalMenu'])->name('roles.saveVerticalMenu');
    Route::get('admin-settings.getHorizontalMenu', [AdminSettingController::class, 'getHorizontalMenu'])->name('roles.getHorizontalMenu');
    Route::get('admin-settings.saveHorizontalMenu', [AdminSettingController::class, 'saveHorizontalMenu'])->name('roles.saveHorizontalMenu');
// });








//dfgdfjhgfjkhgkjdfhg kdfgdfgdfg
/* Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
}); */
