<?php

namespace Database\Seeders;
use App\Models\Employeeuser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employeeuser::create([
           'employ_name' => 'Admin',
            'employ_phone' => '999547846',
            'employ_email' => 'admin@test.com',
            'employ_username' => 'admin',
             'employ_type' => 'admin',
            'employ_password' => Hash::make('admin123'),  
            'status' => 1,
            'done_by'=>0
           
        ]);
    }
}
