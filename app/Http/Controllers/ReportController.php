<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index', $this->summaryData());
    }

    public function download()
    {
        $pdf = Pdf::loadView('pdf.reports', $this->summaryData())
            ->setPaper('a4', 'portrait');

        return $pdf->download('cafe-payroll-report.pdf');
    }

    private function summaryData(): array
    {
        return [
            'totalEmployees' => DB::table('employees')->count(),
            'totalPayroll' => DB::table('payroll')->sum('gross_pay'),
            'totalNetPay' => DB::table('payroll')->sum('net_pay'),
            'totalDeductions' => DB::table('payroll')->sum('total_deductions'),
            'payrollRuns' => DB::table('payroll')->count(),
            'payrollPresentDays' => DB::table('payroll')->sum('present_days'),
            'payrollAbsentDays' => DB::table('payroll')->sum('absent_days'),
            'payrollLateDays' => DB::table('payroll')->sum('late_days'),
            'payrollLateDeductions' => DB::table('payroll')->sum('late_deduction'),
            'present' => DB::table('attendance')->where('status', 'present')->count(),
            'late' => DB::table('attendance')->where('status', 'late')->count(),
            'absent' => DB::table('attendance')->where('status', 'absent')->count(),
            'generatedAt' => now(),
        ];
    }
}
