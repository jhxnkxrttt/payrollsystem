<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
</head>
<body>

<h1>📊 System Reports</h1>

<hr>

<h3>👥 Employees</h3>
<p>Total Employees: {{ $totalEmployees }}</p>

<hr>

<h3>💰 Payroll Summary</h3>
<p>Total Gross Payroll: ₱{{ $totalPayroll }}</p>
<p>Total Net Pay: ₱{{ $totalNetPay }}</p>
<p>Total Deductions: ₱{{ $totalDeductions }}</p>

<hr>

<h3>⏱ Attendance Summary</h3>
<p>Present: {{ $present }}</p>
<p>Late: {{ $late }}</p>
<p>Absent: {{ $absent }}</p>

<hr>

<a href="/admin/dashboard">Back</a>

</body>
</html>
