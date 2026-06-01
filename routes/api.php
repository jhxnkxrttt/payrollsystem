<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PayrollApiController;
use App\Http\Controllers\Api\EmployeeApiController;
use App\Http\Controllers\Api\AttendanceApiController;

Route::prefix('api')->group(function () {
    // Employees API
    Route::get('/employees', [EmployeeApiController::class, 'index']);
    Route::get('/employees/{id}', [EmployeeApiController::class, 'show']);
    Route::post('/employees', [EmployeeApiController::class, 'store']);
    Route::put('/employees/{id}', [EmployeeApiController::class, 'update']);
    Route::delete('/employees/{id}', [EmployeeApiController::class, 'destroy']);

    // Payroll API
    Route::get('/payrolls', [PayrollApiController::class, 'index']);
    Route::get('/payrolls/{id}', [PayrollApiController::class, 'show']);
    Route::post('/payrolls', [PayrollApiController::class, 'store']);
    Route::put('/payrolls/{id}', [PayrollApiController::class, 'update']);
    Route::delete('/payrolls/{id}', [PayrollApiController::class, 'destroy']);
    Route::get('/payrolls/export/json', [PayrollApiController::class, 'exportJson']);
    Route::get('/payrolls/export/csv', [PayrollApiController::class, 'exportCsv']);

    // Attendance API
    Route::get('/attendance', [AttendanceApiController::class, 'index']);
    Route::post('/attendance', [AttendanceApiController::class, 'store']);
    Route::get('/attendance/export/json', [AttendanceApiController::class, 'exportJson']);
    Route::get('/attendance/export/csv', [AttendanceApiController::class, 'exportCsv']);
});
