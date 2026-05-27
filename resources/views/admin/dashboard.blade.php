
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    

<h1>Admin Dashboard</h1>

<p>Welcome Admin</p>

<hr>

<h3>Overview</h3>

<p><strong>Total Employees:</strong> {{ $totalEmployees }}</p>

<h3>Menu</h3>

<ul>
    <li><a href="/admin/employees">Manage Employees</a></li>
    <li><a href="/admin/payroll">Generate Payroll</a></li>
    <li><a href="/admin/payroll/history">Payroll History</a>
    <li><a href="/admin/attendance">Manage Attendance</a></li>
    <li><a href="/admin/deductions">Manage Deductions</a></li>
    <li><a href="/admin/reports">View Reports</a></li>
</li>
</ul>

<hr>

<a href="/logout">Logout</a>

</body>
</html>