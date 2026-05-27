<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // EMPLOYEES
        $totalEmployees = DB::table('employees')->count();

        // PAYROLL TOTALS
        $totalPayroll = DB::table('payroll')->sum('gross_pay');
        $totalNetPay = DB::table('payroll')->sum('net_pay');
        $totalDeductions = DB::table('payroll')->sum('total_deductions');

        // ATTENDANCE SUMMARY
        $present = DB::table('attendance')->where('status', 'present')->count();
        $late = DB::table('attendance')->where('status', 'late')->count();
        $absent = DB::table('attendance')->where('status', 'absent')->count();

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