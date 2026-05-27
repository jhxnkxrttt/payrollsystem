<h2>Add Employee</h2>

<form method="POST" action="/admin/employees/store">

    @csrf

    <input type="text"
           name="name"
           placeholder="Employee Name"
           required>

    <br><br>

    <input type="email"
           name="email"
           placeholder="Email"
           required>

    <br><br>

    <input type="password"
           name="password"
           placeholder="Password"
           required>

    <br><br>

    <input type="text"
           name="position"
           placeholder="Position"
           required>

    <br><br>

    <input type="number"
           name="monthly_salary"
           placeholder="Salary"
           required>

    <br><br>

    <input type="date"
           name="hire_date"
           required>

    <br><br>

    <button type="submit">

        Save Employee

    </button>

</form>