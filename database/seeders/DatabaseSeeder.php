<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $employees = [
            ['name' => 'Miguel Santos', 'position' => 'Manager', 'monthly_salary' => 25000.00, 'email' => 'miguel.santos@cafe.com'],
            ['name' => 'Carla Reyes', 'position' => 'Assistant Manager', 'monthly_salary' => 18000.00, 'email' => 'carla.reyes@cafe.com'],
            ['name' => 'Ramon Dela Cruz', 'position' => 'Head Chef', 'monthly_salary' => 20000.00, 'email' => 'ramon.delacruz@cafe.com'],
            ['name' => 'Paolo Navarro', 'position' => 'Assistant Chef', 'monthly_salary' => 15000.00, 'email' => 'paolo.navarro@cafe.com'],
            ['name' => 'Andrea Lim', 'position' => 'Head Barista', 'monthly_salary' => 16000.00, 'email' => 'andrea.lim@cafe.com'],
            ['name' => 'Sofia Mendoza', 'position' => 'Barista', 'monthly_salary' => 12000.00, 'email' => 'sofia.mendoza@cafe.com'],
            ['name' => 'Kevin Garcia', 'position' => 'Barista', 'monthly_salary' => 12000.00, 'email' => 'kevin.garcia@cafe.com'],
            ['name' => 'Jason Bautista', 'position' => 'Barista', 'monthly_salary' => 12000.00, 'email' => 'jason.bautista@cafe.com'],
            ['name' => 'Mark Villanueva', 'position' => 'Service Crew', 'monthly_salary' => 10000.00, 'email' => 'mark.villanueva@cafe.com'],
            ['name' => 'John Miguel Torres', 'position' => 'Service Crew', 'monthly_salary' => 10000.00, 'email' => 'john.torres@cafe.com'],
            ['name' => 'Carlo Ramos', 'position' => 'Service Crew', 'monthly_salary' => 10000.00, 'email' => 'carlo.ramos@cafe.com'],
            ['name' => 'Ryan Dizon', 'position' => 'Service Crew', 'monthly_salary' => 10000.00, 'email' => 'ryan.dizon@cafe.com'],
            ['name' => 'Angelo Cruz', 'position' => 'Service Crew', 'monthly_salary' => 10000.00, 'email' => 'angelo.cruz@cafe.com'],
        ];

        DB::transaction(function () use ($employees) {
            DB::table('users')->updateOrInsert(
                ['email' => 'admin@cafe.com'],
                [
                    'employee_id' => null,
                    'name' => 'Cafe Admin',
                    'password' => Hash::make('admin123'),
                    'role' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            foreach ($employees as $employee) {
                DB::table('employees')->updateOrInsert(
                    ['name' => $employee['name']],
                    [
                        'position' => $employee['position'],
                        'monthly_salary' => $employee['monthly_salary'],
                        'hire_date' => '2026-01-01',
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

                $storedEmployee = DB::table('employees')
                    ->where('name', $employee['name'])
                    ->first();

                DB::table('users')->updateOrInsert(
                    ['email' => $employee['email']],
                    [
                        'employee_id' => $storedEmployee->id,
                        'name' => $employee['name'],
                        'password' => Hash::make('password'),
                        'role' => $employee['position'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        });
    }
}
