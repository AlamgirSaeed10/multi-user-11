<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\OfficeTimingController;
use App\Http\Controllers\EmployeesLoginController;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'loadRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', function () {
    return redirect('/');
});
Route::get('/', [AuthController::class, 'loadLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);


    Route::get('/profile', [UserSettingController::class, 'profile'])->name('user.profile');
    Route::get('/settings', [UserSettingController::class, 'settings'])->name('user.settings');


    // Employees routes
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    // Notice Board Routes
    Route::get('/notices', [NoticeBoardController::class, 'index'])->name('notices.index');
    Route::get('/notices/create', [NoticeBoardController::class, 'create'])->name('notices.create');
    Route::post('/notices', [NoticeBoardController::class, 'store'])->name('notices.store');
    Route::get('/notices/{notice}', [NoticeBoardController::class, 'show'])->name('notices.show');
    Route::get('/notices/{notice}/edit', [NoticeBoardController::class, 'edit'])->name('notices.edit');
    Route::put('/notices/{notice}', [NoticeBoardController::class, 'update'])->name('notices.update');
    Route::delete('/notices/{notice}', [NoticeBoardController::class, 'destroy'])->name('notices.destroy');

    // Task Manager Routes
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // Office Timing Routes
    Route::get('/office-timings', [OfficeTimingController::class, 'index'])->name('office-timings.index');
    Route::get('/office-timings/create', [OfficeTimingController::class, 'create'])->name('office-timings.create');
    Route::post('/office-timings', [OfficeTimingController::class, 'store'])->name('office-timings.store');
    Route::get('/office-timings/{officeTiming}', [OfficeTimingController::class, 'show'])->name('office-timings.show');
    Route::get('/office-timings/{officeTiming}/edit', [OfficeTimingController::class, 'edit'])->name('office-timings.edit');
    Route::put('/office-timings/{officeTiming}', [OfficeTimingController::class, 'update'])->name('office-timings.update');
    Route::delete('/office-timings/{officeTiming}', [OfficeTimingController::class, 'destroy'])->name('office-timings.destroy');

    //Manager Customer route
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

    // Index route to show all attendance records
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('/attendance/{employee}/month/{year}/{month}', [AttendanceController::class, 'showMonthAttendance'])->name('attendance.month');
    Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
    Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
    Route::get('/attendances/{id}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit');
    Route::put('/attendances/{id}', [AttendanceController::class, 'update'])->name('attendances.update');
    Route::delete('/attendances/{attendance}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');

    // Expense Module
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');       // Display a listing of the resource
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create'); // Show the form for creating a new resource
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');        // Store a newly created resource in storage
    Route::get('/expenses/{expense}', [ExpenseController::class, 'show'])->name('expenses.show');  // Display the specified resource
    Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit'); // Show the form for editing the specified resource
    Route::put('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');  // Update the specified resource in storage
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy'); // Remove the specified resource from storage


    // routes/web.php

    Route::resource('employees_login', EmployeesLoginController::class);
    Route::put('/employees_login/{id}/ban', [EmployeesLoginController::class, 'ban'])->name('employees_login.ban');
    Route::put('/employees_login/{id}/active', [EmployeesLoginController::class, 'active'])->name('employees_login.active');
});

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin', 'middleware' => ['web', 'isSubAdmin']], function () {
    Route::get('/dashboard', [SubAdminController::class, 'dashboard']);
});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'isAdmin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
});

// ********** User Routes *********
Route::group(['middleware' => ['web', 'isUser']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::post('/attendance/mark', [AttendanceController::class, 'mark'])->name('attendance.mark');
    Route::get('/attendance/show/{employeeCode}', [AttendanceController::class, 'show'])->name('attendance.show');
});
