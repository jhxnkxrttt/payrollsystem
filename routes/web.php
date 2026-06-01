<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('login');
});

// AUTH ROUTES
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN ROUTES (Protected by auth.custom:admin middleware)
Route::middleware('auth.custom:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin']);

    Route::get('/admin/employees', [EmployeeController::class, 'index']);
    Route::get('/admin/employees/create', [EmployeeController::class, 'create']);
    Route::post('/admin/employees/store', [EmployeeController::class, 'store']);
    Route::get('/admin/employees/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/admin/employees/update/{id}', [EmployeeController::class, 'update']);
    Route::get('/admin/employees/delete/{id}', [EmployeeController::class, 'delete']);

    Route::get('/admin/payroll', [PayrollController::class, 'index']);
    Route::post('/admin/payroll/generate/{id}', [PayrollController::class, 'generate']);
    Route::post('/admin/payroll/generate-all', [PayrollController::class, 'generateAllAuto']);
    Route::get('/admin/payroll/history', [PayrollController::class, 'history']);

    Route::get('/admin/attendance', [AttendanceController::class, 'index']);
    Route::post('/admin/attendance/store', [AttendanceController::class, 'store']);

    Route::get('/admin/deductions', [DeductionController::class, 'index']);
    Route::post('/admin/deductions/store', [DeductionController::class, 'store']);

    Route::get('/admin/reports', [ReportController::class, 'index']);
});

// EMPLOYEE ROUTES (Protected by auth.custom middleware for employee roles)
Route::middleware('auth.custom:Manager,Assistant Manager,Head Chef,Assistant Chef,Head Barista,Barista,Service Crew')->group(function () {
    Route::get('/employee/dashboard', [DashboardController::class, 'employee']);
    Route::get('/employee/profile', [DashboardController::class, 'profile']);
    Route::get('/employee/payslips', [DashboardController::class, 'payslips']);
    Route::get('/employee/attendance', [DashboardController::class, 'attendance']);
    Route::post('/employee/time-in', [DashboardController::class, 'timeIn']);
    Route::post('/employee/time-out', [DashboardController::class, 'timeOut']);
});
