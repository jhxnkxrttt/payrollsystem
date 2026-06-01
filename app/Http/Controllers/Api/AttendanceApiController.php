<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceApiController extends Controller
{
    public function index()
    {
        $attendance = Attendance::with('employee')->get();
        return response()->json($attendance, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'time_in' => 'nullable|date_format:H:i:s',
            'time_out' => 'nullable|date_format:H:i:s',
            'status' => 'required|in:present,absent,late',
        ]);

        $attendance = Attendance::create($validated);
        return response()->json($attendance, 201);
    }

    public function exportJson()
    {
        $attendance = Attendance::with('employee')->get();
        return response()->json($attendance, 200);
    }

    public function exportCsv()
    {
        $attendance = Attendance::with('employee')->get();
        
        $csv = "ID,Employee,Date,Time In,Time Out,Status\n";
        foreach ($attendance as $record) {
            $csv .= "{$record->id},{$record->employee->name},{$record->date}," .
                    "{$record->time_in},{$record->time_out},{$record->status}\n";
        }

        return response($csv, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="attendance_' . now()->format('Y-m-d') . '.csv"');
    }
}
