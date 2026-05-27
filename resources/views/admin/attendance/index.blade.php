<!DOCTYPE html>
<html>
<head>
    <title>Manage Attendance</title>
</head>
<body>

<h1>Manage Attendance</h1>

@if(session('success'))

    <p style="color:green;">
        {{ session('success') }}
    </p>

@endif

<hr>

<h3>Add Attendance</h3>

<form method="POST" action="/admin/attendance/store">

    @csrf

    <label>Employee</label>

    <select name="employee_id" required>

        <option value="">Select Employee</option>

        @foreach($employees as $emp)

            <option value="{{ $emp->id }}">

                {{ $emp->name }}

            </option>

        @endforeach

    </select>

    <br><br>

    <label>Date</label>

    <input type="date"
           name="date"
           required>

    <br><br>

    <label>Time In</label>

    <input type="time"
           name="time_in">

    <br><br>

    <label>Time Out</label>

    <input type="time"
           name="time_out">

    <br><br>

    <label>Status</label>

    <select name="status">

        <option value="present">Present</option>

        <option value="late">Late</option>

        <option value="absent">Absent</option>

    </select>

    <br><br>

    <button type="submit">

        Save Attendance

    </button>

</form>

<hr>

<h3>Attendance Records</h3>

<table border="1" cellpadding="10">

    <tr>

        <th>Employee</th>

        <th>Position</th>

        <th>Date</th>

        <th>Time In</th>

        <th>Time Out</th>

        <th>Status</th>

    </tr>

    @foreach($attendance as $a)

    <tr>

        <td>{{ $a->name }}</td>

        <td>{{ $a->position }}</td>

        <td>{{ $a->date }}</td>

        <td>{{ $a->time_in }}</td>

        <td>{{ $a->time_out }}</td>

        <td>{{ $a->status }}</td>

    </tr>

    @endforeach

</table>

<br>

<a href="/admin/dashboard">

    Back

</a>

</body>
</html>