<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    // SHOW EMPLOYEES
    public function index()
    {
        $employees = DB::table('employees')->get();

        return view('admin.payroll.index', compact('employees'));
    }

    public function generate(Request $request, $id)
{
    $employee = DB::table('employees')
        ->where('id', $id)
        ->first();

    if (!$employee) {
        return back()->with('error', 'Employee not found');
    }

    $start = $request->cut_off_start;
    $end = $request->cut_off_end;

    // DAILY RATE (15 days cutoff)
    $dailyRate = $employee->monthly_salary / 15;

    // GET ATTENDANCE
    $attendance = DB::table('attendance')
        ->where('employee_id', $id)
        ->whereBetween('date', [$start, $end])
        ->get();

    $presentDays = 0;
    $lateDays = 0;
    $absentDays = 0;

    foreach ($attendance as $a) {
        if ($a->status == 'present') $presentDays++;
        if ($a->status == 'late') $lateDays++;
        if ($a->status == 'absent') $absentDays++;
    }

    // COMPUTATION
    $grossPay = $dailyRate * ($presentDays + $lateDays);

    $lateDeduction = $lateDays * ($dailyRate * 0.2);
    $absentDeduction = $absentDays * $dailyRate;

    // MANUAL DEDUCTIONS (SSS, etc.)
    $manualDeduction = DB::table('deductions')
        ->where('employee_id', $id)
        ->sum('amount');

    // TOTAL DEDUCTION
    $totalDeduction = $lateDeduction + $absentDeduction + $manualDeduction;

    // NET PAY
    $netPay = $grossPay - $totalDeduction;

    // SAVE PAYROLL
    DB::table('payroll')->insert([
        'employee_id' => $id,
        'cut_off_start' => $start,
        'cut_off_end' => $end,
        'total_days' => 15,
        'gross_pay' => $grossPay,
        'total_deductions' => $totalDeduction,
        'net_pay' => $netPay,
        'generated_at' => now()
    ]);

    return back()->with('success', 'Payroll generated successfully!');
}
}