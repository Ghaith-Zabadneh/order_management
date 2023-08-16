<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\OrderFactory;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'مسؤول',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'مستخدم',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'code' => 'password'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'موظف',
            'email' => 'employee@employee.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
            'code' => 'password'
        ]);

        OrderFactory::factory(5)->create();
    }
}
