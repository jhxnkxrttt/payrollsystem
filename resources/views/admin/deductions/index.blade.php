<!DOCTYPE html>
<html>
<head>
    <title>Manage Deductions</title>
</head>
<body>

<h1>Manage Deductions</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<hr>

<h3>Add Deduction</h3>

<form method="POST" action="/admin/deductions/store">

    @csrf

    <label>Employee</label>

    <select name="employee_id" required>
        @foreach($employees as $emp)
            <option value="{{ $emp->id }}">
                {{ $emp->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Type</label>

    <label>Type</label>
<select name="type" id="type" required>
    <option value="">Select Type</option>
    <option value="SSS">SSS</option>
    <option value="Pag-IBIG">Pag-IBIG</option>
    <option value="PhilHealth">PhilHealth</option>
    <option value="Late">Late</option>
    <option value="Other">Other</option>
</select>

<br><br>

<label>Amount</label>
<input type="number" name="amount" id="amount" step="0.01" required>
    <br><br>

    <label>Description</label>
    <input type="text" name="description">

    <br><br>

    <button type="submit">
        Save Deduction
    </button>

</form>

<hr>

<h3>Deduction List</h3>

<table border="1" cellpadding="10">

    <tr>
        <th>Employee</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Description</th>
        <th>Date</th>
    </tr>

    @foreach($deductions as $d)

    <tr>
        <td>{{ $d->name }}</td>
        <td>{{ $d->type }}</td>
        <td>₱{{ $d->amount }}</td>
        <td>{{ $d->description }}</td>
        <td>{{ $d->created_at }}</td>
    </tr>

    @endforeach

</table>

<br>

<a href="/admin/dashboard">Back</a>

</body>
<script>
document.getElementById('type').addEventListener('change', function () {

    let type = this.value;
    let amount = document.getElementById('amount');

    // DEFAULT RULES
    if (type === 'SSS') {
        amount.value = 500;
        amount.readOnly = true;
    }

    else if (type === 'Pag-IBIG') {
        amount.value = 200;
        amount.readOnly = true;
    }

    else if (type === 'PhilHealth') {
        amount.value = 300;
        amount.readOnly = true;
    }

    else if (type === 'Late') {
        amount.value = 200;
        amount.readOnly = true;
    }

    else {
        amount.value = '';
        amount.readOnly = false;
    }

});
</script>
</html>
