<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    // SHOW ATTENDANCE PAGE
    public function index()
    {
        $employees = DB::table('employees')->get();

        $attendance = DB::table('attendance')

            ->join('employees', 'attendance.employee_id', '=', 'employees.id')

            ->select(
                'attendance.*',
                'employees.name',
                'employees.position'
            )

            ->orderBy('date', 'desc')

            ->get();

        return view('admin.attendance.index', compact(
            'employees',
            'attendance'
        ));
    }

    // SAVE ATTENDANCE
    public function store(Request $request)
    {
        DB::table('attendance')->insert([

            'employee_id' => $request->employee_id,

            'date' => $request->date,

            'time_in' => $request->time_in,

            'time_out' => $request->time_out,

            'status' => $request->status,

            'created_at' => now()
        ]);

        return back()->with('success', 'Attendance added!');
    }
}