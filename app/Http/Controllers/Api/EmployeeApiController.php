<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index()
    {
        return response()->json(Employee::all(), 200);
    }

    public function show($id)
    {
        $employee = Employee::with(['payrolls', 'attendances', 'deductions'])->findOrFail($id);
        return response()->json($employee, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:50',
            'monthly_salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
        ]);

        $employee = Employee::create($validated + ['status' => 'active']);
        return response()->json($employee, 201);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $validated = $request->validate([
            'name' => 'string|max:100',
            'position' => 'string|max:50',
            'monthly_salary' => 'numeric|min:0',
            'hire_date' => 'date',
            'status' => 'in:active,inactive',
        ]);

        $employee->update($validated);
        return response()->json($employee, 200);
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json(['message' => 'Employee deleted'], 204);
    }
}
