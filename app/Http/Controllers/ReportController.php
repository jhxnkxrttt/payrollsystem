<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Attendance;

class ReportController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalPayroll = Payroll::sum('gross_pay');
        $totalNetPay = Payroll::sum('net_pay');
        $totalDeductions = Payroll::sum('total_deductions');

        $present = Attendance::where('status', 'present')->count();
        $late = Attendance::where('status', 'late')->count();
        $absent = Attendance::where('status', 'absent')->count();

        return view('admin.reports.index', compact(
            'totalEmployees',
            'totalPayroll',
            'totalNetPay',
            'totalDeductions',
            'present',
            'late',
            'absent'
        ));
    }
}