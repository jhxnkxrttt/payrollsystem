<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::insert([
            [
                'name' => 'Miguel Santos',
                'position' => 'Manager',
                'monthly_salary' => 25000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carla Reyes',
                'position' => 'Assistant Manager',
                'monthly_salary' => 18000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ramon Dela Cruz',
                'position' => 'Head Chef',
                'monthly_salary' => 20000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paolo Navarro',
                'position' => 'Assistant Chef',
                'monthly_salary' => 15000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andrea Lim',
                'position' => 'Head Barista',
                'monthly_salary' => 16000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sofia Mendoza',
                'position' => 'Barista',
                'monthly_salary' => 12000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kevin Garcia',
                'position' => 'Barista',
                'monthly_salary' => 12000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jason Bautista',
                'position' => 'Barista',
                'monthly_salary' => 12000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mark Villanueva',
                'position' => 'Service Crew',
                'monthly_salary' => 10000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Miguel Torres',
                'position' => 'Service Crew',
                'monthly_salary' => 10000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlo Ramos',
                'position' => 'Service Crew',
                'monthly_salary' => 10000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ryan Dizon',
                'position' => 'Service Crew',
                'monthly_salary' => 10000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Angelo Cruz',
                'position' => 'Service Crew',
                'monthly_salary' => 10000.00,
                'hire_date' => '2026-01-01',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
