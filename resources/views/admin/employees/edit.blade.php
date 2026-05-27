<h2>Edit Employee</h2>

<form method="POST" action="/admin/employees/update/{{ $employee->id }}">

    @csrf

    <input type="text" name="name" value="{{ $employee->name }}">
    <br><br>

    <input type="text" name="position" value="{{ $employee->position }}">
    <br><br>

    <input type="number" name="monthly_salary" value="{{ $employee->monthly_salary }}">
    <br><br>

    <button type="submit">
        Update Employee
    </button>

</form>

<br>

<a href="/admin/employees">Back</a>