<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports')->insert([
            ['title' => 'Keluhan 3', 'date' => '2024-01-01', 'complaint' => 'Keluhan mengenai layanan', 'status' => 'Belum Selesai'],
            ['title' => 'Keluhan 4', 'date' => '2024-01-01', 'complaint' => 'Keluhan mengenai layanan', 'status' => 'Belum Selesai'],
            ['title' => 'Keluhan 5', 'date' => '2024-01-01', 'complaint' => 'Keluhan mengenai layanan', 'status' => 'Belum Selesai'],
            ['title' => 'Keluhan 6', 'date' => '2024-01-01', 'complaint' => 'Keluhan mengenai layanan', 'status' => 'Belum Selesai'],
        ]);
    }
}
