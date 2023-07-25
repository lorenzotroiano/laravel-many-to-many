<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = Technology::factory()->count(10)->create();

        foreach ($technologies as $technology) {

            $projects = Project::inRandomOrder()->limit(rand(1, 3))->get();

            $technology->projects()->attach($projects);
        }
    }
}
