<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('levels')->insert([
            'level' => 'junior'
        ]);
        DB::table('levels')->insert([
            'level' => 'strong_junior'
        ]);
        DB::table('levels')->insert([
            'level' => 'middle'
        ]);
    }
}