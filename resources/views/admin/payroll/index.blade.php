<!DOCTYPE html>
<html>
<head>
    <title>Generate Payroll</title>
</head>
<body>

<h1>Generate Payroll (Auto 15-Day System)</h1>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<table border="1" cellpadding="10">

    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Monthly Salary</th>
    </tr>

    @foreach($employees as $emp)
    <tr>
        <td>{{ $emp->name }}</td>
        <td>{{ $emp->position }}</td>
        <td>₱{{ $emp->monthly_salary }}</td>
    </tr>
    @endforeach

</table>

<br>

<form method="POST" action="/admin/payroll/generate-all">
    @csrf

    <button type="submit" style="padding:10px 20px;">
        Generate Payroll (Auto 15-day Cutoff)
    </button>
</form>

<br>

<a href="/admin/dashboard">Back</a>

</body>
</html>