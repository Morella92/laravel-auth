<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {

            $project = new Project();
            $project->title = $faker->unique()->sentence($faker->numberBetween(5, 10));
            $project->client = $faker->name();
            $project->content = $faker->paragraphs(3, true);
            // $project->content = $faker->optional()->text(500);
            $project->slug = Str::slug($project->title, '-');
            $project->url = $faker->optional()->url();
            $project->save();
        }
    }
}
