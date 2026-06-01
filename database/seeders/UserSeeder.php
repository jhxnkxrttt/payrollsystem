<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'employee_id' => null,
                'email' => 'admin@cafe.com',
                'password' => 'admin123',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 1,
                'email' => 'miguel.santos@cafe.com',
                'password' => 'password123',
                'role' => 'Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 2,
                'email' => 'carla.reyes@cafe.com',
                'password' => 'password123',
                'role' => 'Assistant Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 3,
                'email' => 'ramon.delacruz@cafe.com',
                'password' => 'password123',
                'role' => 'Head Chef',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 4,
                'email' => 'paolo.navarro@cafe.com',
                'password' => 'password123',
                'role' => 'Assistant Chef',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 5,
                'email' => 'andrea.lim@cafe.com',
                'password' => 'password123',
                'role' => 'Head Barista',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 6,
                'email' => 'sofia.mendoza@cafe.com',
                'password' => 'password123',
                'role' => 'Barista',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 7,
                'email' => 'kevin.garcia@cafe.com',
                'password' => 'password123',
                'role' => 'Barista',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 8,
                'email' => 'jason.bautista@cafe.com',
                'password' => 'password123',
                'role' => 'Barista',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 9,
                'email' => 'mark.villanueva@cafe.com',
                'password' => 'password123',
                'role' => 'Service Crew',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 10,
                'email' => 'john.torres@cafe.com',
                'password' => 'password123',
                'role' => 'Service Crew',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 11,
                'email' => 'carlo.ramos@cafe.com',
                'password' => 'password123',
                'role' => 'Service Crew',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 12,
                'email' => 'ryan.dizon@cafe.com',
                'password' => 'password123',
                'role' => 'Service Crew',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employee_id' => 13,
                'email' => 'angelo.cruz@cafe.com',
                'password' => 'password123',
                'role' => 'Service Crew',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
