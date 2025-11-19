<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
           
            'phone' => '999547846',
            'email' => 'admin@test.com',
            'login_name' => 'admin',
            'password' => Hash::make('admin123'),  
            'status' => 1,
            'done_by'=>0
           
        ]);
    }
}
