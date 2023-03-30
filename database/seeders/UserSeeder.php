<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nik_name' => 'super_admin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123123'),
            'status' => 'active',
            'payment_status' => 'active'
        ]);
    }
}