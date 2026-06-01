<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function employee()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect('/');
        }

        $user = User::findOrFail($userId);
        $employee = $user->employee;

        return view('employee.dashboard', compact('employee'));
    }

    public function admin()
    {
        $totalEmployees = Employee::count();
        $totalPayroll = Payroll::sum('net_pay');
        $latestPayroll = Payroll::with('employee')
            ->orderBy('generated_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalEmployees',
            'totalPayroll',
            'latestPayroll'
        ));
    }

    public function profile()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect('/');
        }

        $user = User::findOrFail($userId);
        $employee = $user->employee;

        return view('employee.profile', compact('user', 'employee'));
    }

    public function payslips()
    {
        $userId = session('user_id');
        $user = User::findOrFail($userId);

        $payslips = Payroll::where('employee_id', $user->employee_id)
            ->orderBy('generated_at', 'desc')
            ->get();

        return view('employee.payslips', compact('payslips'));
    }

    public function attendance()
    {
        $userId = session('user_id');
        $user = User::findOrFail($userId);

        $logs = Attendance::where('employee_id', $user->employee_id)
            ->orderBy('date', 'desc')
            ->get();

        return view('employee.attendance', compact('logs'));
    }

    public function timeIn()
    {
        $userId = session('user_id');
        $user = User::findOrFail($userId);

        Attendance::create([
            'employee_id' => $user->employee_id,
            'date' => now()->toDateString(),
            'time_in' => now(),
            'status' => 'present',
        ]);

        return back()->with('success', 'Time in recorded successfully!');
    }

    public function timeOut()
    {
        $userId = session('user_id');
        $user = User::findOrFail($userId);

        Attendance::where('employee_id', $user->employee_id)
            ->where('date', now()->toDateString())
            ->update(['time_out' => now()]);

        return back()->with('success', 'Time out recorded successfully!');
    }
}
