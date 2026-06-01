<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $attendance = Attendance::with('employee')->orderBy('date', 'desc')->get();

        return view('admin.attendance.index', compact('employees', 'attendance'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'time_in' => 'nullable|date_format:H:i:s',
            'time_out' => 'nullable|date_format:H:i:s',
            'status' => 'required|in:present,absent,late',
        ]);

        Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $request->date,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Attendance added successfully!');
    }
}