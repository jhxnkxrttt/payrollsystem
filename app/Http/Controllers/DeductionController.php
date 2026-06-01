<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Deduction;

class DeductionController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $deductions = Deduction::with('employee')->orderBy('created_at', 'desc')->get();

        return view('admin.deductions.index', compact('employees', 'deductions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type' => 'required|in:SSS,PhilHealth,Pag-IBIG,Late,Absent,Other',
            'description' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric|min:0',
        ]);

        $employee = Employee::findOrFail($request->employee_id);
        $amount = $request->amount ?? 0;

        match ($request->type) {
            'SSS' => $amount = $employee->monthly_salary * 0.045,
            'PhilHealth' => $amount = $employee->monthly_salary * 0.025,
            'Pag-IBIG' => $amount = 200,
            'Late' => $amount = 200,
            default => $amount = $request->amount,
        };

        Deduction::create([
            'employee_id' => $request->employee_id,
            'type' => $request->type,
            'amount' => $amount,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Deduction saved successfully!');
    }
}