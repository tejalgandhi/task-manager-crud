<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'name' => 'Project Alpha',
                'description' => 'A description for Project Alpha.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Project Beta',
                'description' => 'A description for Project Beta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Project Gamma',
                'description' => 'A description for Project Gamma.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Project Delta',
                'description' => 'A description for Project Delta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Add more projects as needed
        ]);
    }
}
