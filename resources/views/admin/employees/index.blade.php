<h2>Employees</h2>

<a href="/admin/employees/create">
    Add Employee
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>

    @foreach($employees as $emp)

    <tr>
        <td>{{ $emp->id }}</td>
        <td>{{ $emp->name }}</td>
        <td>{{ $emp->position }}</td>
        <td>₱{{ $emp->monthly_salary }}</td>

        <td>
            <a href="/admin/employees/edit/{{ $emp->id }}">
                Edit
            </a>

            |

            <a href="/admin/employees/delete/{{ $emp->id }}">
                Delete
            </a>
        </td>
    </tr>

    @endforeach

</table>

<br>

<a href="/admin/dashboard">Back</a>