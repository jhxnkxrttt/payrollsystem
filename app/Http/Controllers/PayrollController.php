<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Attendance;
use App\Models\Deduction;

class PayrollController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.payroll.index', compact('employees'));
    }

    public function generate(Request $request, $id)
    {
        $request->validate([
            'cut_off_start' => 'required|date',
            'cut_off_end' => 'required|date|after_or_equal:cut_off_start',
        ]);

        $employee = Employee::findOrFail($id);
        $start = $request->cut_off_start;
        $end = $request->cut_off_end;

        // Calculate payroll
        $payrollData = $this->calculatePayroll($employee, $start, $end);

        Payroll::create($payrollData);

        return back()->with('success', 'Payroll generated successfully!');
    }

    public function generateAllAuto()
    {
        $now = now();
        $today = $now->day;

        if (!($today === 15 || $today === $now->copy()->endOfMonth()->day)) {
            return back()->with('error', 'Not payroll cutoff day.');
        }

        if ($today === 15) {
            $start = $now->copy()->startOfMonth()->toDateString();
            $end = $now->copy()->setDay(15)->toDateString();
        } else {
            $start = $now->copy()->setDay(16)->toDateString();
            $end = $now->copy()->endOfMonth()->toDateString();
        }

        $employees = Employee::where('status', 'active')->get();
        $count = 0;

        foreach ($employees as $employee) {
            $payrollData = $this->calculatePayroll($employee, $start, $end);
            Payroll::create($payrollData);
            $count++;
        }

        return back()->with('success', "Auto payroll generated for $count employees!");
    }

    public function history()
    {
        $payrolls = Payroll::with('employee')
            ->orderBy('generated_at', 'desc')
            ->get();

        return view('admin.payroll.history', compact('payrolls'));
    }

    private function calculatePayroll(Employee $employee, $start, $end)
    {
        $dailyRate = $employee->monthly_salary / 15;

        $attendance = Attendance::where('employee_id', $employee->id)
            ->whereBetween('date', [$start, $end])
            ->get();

        $presentDays = $attendance->where('status', 'present')->count();
        $lateDays = $attendance->where('status', 'late')->count();
        $absentDays = $attendance->where('status', 'absent')->count();

        $workedDays = $presentDays + $lateDays;
        $grossPay = $workedDays * $dailyRate;
        $lateDeduction = $lateDays * ($dailyRate * 0.2);
        $absentDeduction = $absentDays * $dailyRate;

        $manualDeduction = Deduction::where('employee_id', $employee->id)->sum('amount');

        $totalDeduction = $lateDeduction + $absentDeduction + $manualDeduction;
        $netPay = max(0, $grossPay - $totalDeduction);

        return [
            'employee_id' => $employee->id,
            'cut_off_start' => $start,
            'cut_off_end' => $end,
            'total_days' => 15,
            'gross_pay' => $grossPay,
            'total_deductions' => $totalDeduction,
            'net_pay' => $netPay,
            'generated_at' => now(),
        ];
    }
}
