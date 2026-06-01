<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:50',
            'monthly_salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'position' => $request->position,
            'monthly_salary' => $request->monthly_salary,
            'hire_date' => $request->hire_date,
            'status' => 'active',
        ]);

        User::create([
            'employee_id' => $employee->id,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->position,
        ]);

        return redirect('/admin/employees')
            ->with('success', 'Employee added successfully!');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:50',
            'monthly_salary' => 'required|numeric|min:0',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update([
            'name' => $request->name,
            'position' => $request->position,
            'monthly_salary' => $request->monthly_salary,
        ]);

        return redirect('/admin/employees')
            ->with('success', 'Employee updated successfully!');
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/admin/employees')
            ->with('success', 'Employee deleted successfully!');
    }
}
