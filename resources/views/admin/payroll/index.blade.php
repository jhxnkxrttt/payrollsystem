<!DOCTYPE html>
<html>
<head>
    <title>Generate Payroll</title>
</head>
<body>

<h1>Generate Payroll</h1>

@if(session('success'))

    <p style="color:green;">
        {{ session('success') }}
    </p>

@endif

<table border="1" cellpadding="10">

    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Action</th>
    </tr>

    @foreach($employees as $emp)

    <tr>

        <td>{{ $emp->name }}</td>

        <td>{{ $emp->position }}</td>

        <td>₱{{ $emp->monthly_salary }}</td>

        <td>

            <form method="POST"
                  action="/admin/payroll/generate/{{ $emp->id }}">

                @csrf

                <input type="date"
                       name="cut_off_start"
                       required>

                <br><br>

                <input type="date"
                       name="cut_off_end"
                       required>

                <br><br>

                <button type="submit">

                    Generate Payroll

                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

<br>

<a href="/admin/dashboard">

    Back

</a>

</body>
</html>