<nav class="navbar">
    <h1>☕ Café Payroll</h1>
    <ul class="nav-links">
        @if(session('role') === 'admin')
            <x-nav-link href="/admin/dashboard" :active="request()->is('admin/dashboard')" label="Dashboard" />
            <x-nav-link href="/admin/employees" :active="request()->is('admin/employees*')" label="Employees" />
            <x-nav-link href="/admin/payroll" :active="request()->is('admin/payroll*')" label="Payroll" />
            <x-nav-link href="/admin/attendance" :active="request()->is('admin/attendance*')" label="Attendance" />
            <x-nav-link href="/admin/deductions" :active="request()->is('admin/deductions*')" label="Deductions" />
            <x-nav-link href="/admin/reports" :active="request()->is('admin/reports*')" label="Reports" />
        @else
            <x-nav-link href="/employee/dashboard" :active="request()->is('employee/dashboard')" label="Dashboard" />
            <x-nav-link href="/employee/profile" :active="request()->is('employee/profile')" label="Profile" />
            <x-nav-link href="/employee/payslips" :active="request()->is('employee/payslips')" label="Payslips" />
            <x-nav-link href="/employee/attendance" :active="request()->is('employee/attendance')" label="Attendance" />
        @endif
        <li>
            <span style="color: #bdc3c7;">{{ session('role') === 'admin' ? 'Admin' : 'Employee' }} |</span>
            <a href="/logout" style="margin-left: 1rem;">Logout</a>
        </li>
    </ul>
</nav>
