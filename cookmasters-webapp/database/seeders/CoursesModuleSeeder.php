<?php

namespace Database\Seeders;

use App\Models\CoursesModule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            for ($j = 1; $j < 11; $j++) {
                CoursesModule::factory()->create([
                    'course_id' => $j,
                    'previous_module_id' => $j - 1,
                    'next_module_id' => $j + 1,
                ]);
            }
        }
    }
}
