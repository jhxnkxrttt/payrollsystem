<!DOCTYPE html>
<html>
<head>
    <title>Employee Profile</title>
</head>
<body>

<h1>👤 Employee Profile</h1>

<hr>

<h2>Personal Info</h2>

<p><strong>Name:</strong> {{ $employee->name ?? 'N/A' }}</p>
<p><strong>Position:</strong> {{ $employee->position ?? 'N/A' }}</p>
<p><strong>Salary:</strong> ₱{{ $employee->monthly_salary ?? '0' }}</p>
<p><strong>Status:</strong> {{ $employee->status ?? 'N/A' }}</p>

<hr>

<h2>Account Info</h2>

<p><strong>Email:</strong> {{ $user->email ?? 'N/A' }}</p>
<p><strong>Role:</strong> {{ $user->role ?? 'N/A' }}</p>

<hr>

<a href="/employee/dashboard">⬅ Back to Dashboard</a>

</body>
</html>