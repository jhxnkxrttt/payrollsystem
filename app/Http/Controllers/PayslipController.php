<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PayslipController extends Controller
{
    public function download($id)
    {
        $payslip = DB::table('payroll')
            ->where('id', $id)
            ->first();

        if (!$payslip) {
            return back()->withErrors(['error' => 'Payslip not found.']);
        }

        $employee = DB::table('employees')
            ->where('id', $payslip->employee_id)
            ->first();

        if (!$employee) {
            return back()->withErrors(['error' => 'Employee not found for this payslip.']);
        }

        $selectedDeductions = json_decode($payslip->selected_deductions ?? '[]', true);

        $pdf = Pdf::loadView('pdf.payslip', [
            'payslip' => $payslip,
            'employee' => $employee,
            'selectedDeductions' => $selectedDeductions,
        ]);

        return $pdf->download('payslip-'.$employee->name.'.pdf');
    }
}
