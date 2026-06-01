<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollApiController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('employee')->get();
        return response()->json($payrolls, 200);
    }

    public function show($id)
    {
        $payroll = Payroll::with('employee')->findOrFail($id);
        return response()->json($payroll, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'cut_off_start' => 'required|date',
            'cut_off_end' => 'required|date',
            'total_days' => 'required|integer',
            'gross_pay' => 'required|numeric',
            'total_deductions' => 'required|numeric',
            'net_pay' => 'required|numeric',
        ]);

        $payroll = Payroll::create($validated + ['generated_at' => now()]);
        return response()->json($payroll, 201);
    }

    public function update(Request $request, $id)
    {
        $payroll = Payroll::findOrFail($id);
        $validated = $request->validate([
            'cut_off_start' => 'date',
            'cut_off_end' => 'date',
            'gross_pay' => 'numeric',
            'total_deductions' => 'numeric',
            'net_pay' => 'numeric',
        ]);

        $payroll->update($validated);
        return response()->json($payroll, 200);
    }

    public function destroy($id)
    {
        Payroll::destroy($id);
        return response()->json(['message' => 'Payroll deleted'], 204);
    }

    public function exportJson()
    {
        $payrolls = Payroll::with('employee')->get();
        return response()->json($payrolls, 200);
    }

    public function exportCsv()
    {
        $payrolls = Payroll::with('employee')->get();
        
        $csv = "ID,Employee,Cut-off Start,Cut-off End,Gross Pay,Total Deductions,Net Pay\n";
        foreach ($payrolls as $payroll) {
            $csv .= "{$payroll->id},{$payroll->employee->name}," .
                    "{$payroll->cut_off_start},{$payroll->cut_off_end}," .
                    "{$payroll->gross_pay},{$payroll->total_deductions}," .
                    "{$payroll->net_pay}\n";
        }

        return response($csv, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="payroll_' . now()->format('Y-m-d') . '.csv"');
    }
}
