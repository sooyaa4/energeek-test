<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            [
                'name'          => 'PHP',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'PostgreSQL',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'API (JSON,REST)',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
