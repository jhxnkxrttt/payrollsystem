<!DOCTYPE html>
<html>
<head>
    <title>Payroll History</title>
</head>
<body>

<h1>Payroll History</h1>

<table border="1" cellpadding="10">

    <tr>

        <th>Employee</th>

        <th>Position</th>

        <th>Gross Pay</th>

        <th>Deductions</th>

        <th>Net Pay</th>

        <th>Cut Off</th>

        <th>Date Generated</th>

    </tr>

    @foreach($payrolls as $pay)

    <tr>

        <td>{{ $pay->name }}</td>

        <td>{{ $pay->position }}</td>

        <td>₱{{ $pay->gross_pay }}</td>

        <td>₱{{ $pay->total_deductions }}</td>

        <td>₱{{ $pay->net_pay }}</td>

        <td>
            {{ $pay->cut_off_start }}
            to
            {{ $pay->cut_off_end }}
        </td>

        <td>{{ $pay->generated_at }}</td>

    </tr>

    @endforeach

</table>

<br>

<a href="/admin/dashboard">

    Back

</a>

</body>
</html>