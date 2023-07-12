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
        for ($i = 1; $i < 11; $i++) {
            for ($j = 1; $j < 11; $j++) {
                CoursesModule::factory()->create([
                    'courses_id' => $i,
                    'previous_module_id' => $j != 1 ? $j*$i - 1 : null,
                    'next_module_id' => $j != 10 ? $j*$i + 1 : null
                ]);
            }
        }
    }
}
