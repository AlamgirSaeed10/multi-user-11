<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    TaskController,
    UserController,
    AdminController,
    CustomerController,
    EmployeeController,
    SubAdminController,
    AttendanceController,
    SuperAdminController,
    NoticeBoardController,
    UserSettingController,
    OfficeTimingController,
    EmployeesLoginController,
    ExpenseController
};

// Public routes
Route::get('/', [AuthController::class, 'loadLogin']);
Route::get('/register', [AuthController::class, 'loadRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ********** Super Admin Routes *********
// Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {

//     Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);
//     Route::get('/profile', [UserSettingController::class, 'profile'])->name('user.profile');
//     Route::get('/settings', [UserSettingController::class, 'settings'])->name('user.settings');
//     // Route::get('/employeeslogin', [EmployeesLoginController::class, 'index'])->name('employeeslogin.index');

//     // Route::get('/dashboard', [SubAdminController::class, 'dashboard']);

//     Route::resource('office-timings', OfficeTimingController::class);
//     Route::resource('attendances', AttendanceController::class);
//     Route::resource('employees', EmployeeController::class);
//     Route::resource('notices', NoticeBoardController::class);
//     Route::resource('tasks', TaskController::class);
//     Route::resource('expenses', ExpenseController::class);
//     Route::resource('customers', CustomerController::class);
//     Route::resource('employees', EmployeeController::class);
//     Route::resource('notices', NoticeBoardController::class);
//     Route::resource('tasks', TaskController::class);
//     Route::resource('office-timings', OfficeTimingController::class);
//     Route::resource('customers', CustomerController::class);

//     Route::resource('expenses', ExpenseController::class);
//     Route::resource('employees_login', EmployeesLoginController::class);
//     Route::put('employees_login/{id}/ban', [EmployeesLoginController::class, 'ban'])->name('employees_login.ban');
//     Route::put('employees_login/{id}/active', [EmployeesLoginController::class, 'active'])->name('employees_login.active');
// });

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin', 'middleware' => ['web', 'isSubAdmin']], function () {
    Route::get('/dashboard', [SubAdminController::class, 'dashboard']);

    Route::resource('office-timings', OfficeTimingController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('notices', NoticeBoardController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('customers', CustomerController::class);
});
Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('/dashboard', [SubAdminController::class, 'dashboard']);

    Route::resource('office-timings', OfficeTimingController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('notices', NoticeBoardController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('/employeeslogin', [EmployeesLoginController::class, 'index'])->name('employeeslogin.index');

});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'isAdmin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
});

// ********** User Routes *********
Route::group(['prefix' => 'employees', 'middleware' => ['web', 'isUser']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::post('/attendance/mark', [AttendanceController::class, 'mark'])->name('attendance.mark');
    Route::get('/attendance/show/{employeeCode}', [AttendanceController::class, 'show'])->name('emp-attendance.show');
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('/employees-list', [AttendanceController::class, 'getEmployees'])->name('attendances.emp');
    Route::get('/attendances', [AttendanceController::class, 'getAttendances'])->name('api.attendances');
});
