<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cafe Payroll Report</title>
    <style>
        body {
            color: #17211f;
            font-family: Arial, sans-serif;
            font-size: 13px;
            line-height: 1.5;
            margin: 0;
        }

        h1 {
            color: #153f3b;
            font-size: 24px;
            margin: 0 0 4px;
        }

        h2 {
            color: #225c55;
            font-size: 16px;
            margin: 24px 0 8px;
        }

        .muted {
            color: #66726f;
        }

        .summary {
            border-collapse: collapse;
            margin-top: 16px;
            width: 100%;
        }

        .summary th,
        .summary td {
            border: 1px solid #dfe7e2;
            padding: 9px 10px;
            text-align: left;
        }

        .summary th {
            background: #e3f0ed;
            color: #153f3b;
            font-weight: bold;
        }

        .value {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Cafe Payroll Report</h1>
    <div class="muted">Generated {{ $generatedAt->format('F j, Y g:i A') }}</div>

    <h2>Payroll Summary</h2>
    <table class="summary">
        <tr>
            <th>Metric</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Employees</td>
            <td class="value">{{ $totalEmployees }}</td>
        </tr>
        <tr>
            <td>Payroll runs</td>
            <td class="value">{{ $payrollRuns }}</td>
        </tr>
        <tr>
            <td>Gross payroll</td>
            <td class="value">PHP {{ number_format($totalPayroll, 2) }}</td>
        </tr>
        <tr>
            <td>Net pay</td>
            <td class="value">PHP {{ number_format($totalNetPay, 2) }}</td>
        </tr>
        <tr>
            <td>Total deductions</td>
            <td class="value">PHP {{ number_format($totalDeductions, 2) }}</td>
        </tr>
        <tr>
            <td>Late deductions</td>
            <td class="value">PHP {{ number_format($payrollLateDeductions, 2) }}</td>
        </tr>
    </table>

    <h2>Attendance Summary</h2>
    <table class="summary">
        <tr>
            <th>Metric</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Payroll present days</td>
            <td class="value">{{ $payrollPresentDays }}</td>
        </tr>
        <tr>
            <td>Payroll absent days</td>
            <td class="value">{{ $payrollAbsentDays }}</td>
        </tr>
        <tr>
            <td>Payroll late count</td>
            <td class="value">{{ $payrollLateDays }}</td>
        </tr>
        <tr>
            <td>Attendance present records</td>
            <td class="value">{{ $present }}</td>
        </tr>
        <tr>
            <td>Attendance late records</td>
            <td class="value">{{ $late }}</td>
        </tr>
        <tr>
            <td>Attendance absent records</td>
            <td class="value">{{ $absent }}</td>
        </tr>
    </table>
</body>
</html>
