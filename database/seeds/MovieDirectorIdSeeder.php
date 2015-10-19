<?php

use Illuminate\Database\Seeder;
use App\Director;
use App\Movie;

class MovieDirectorIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $directorsIds = Director::lists('id')->toArray();

        $movies = Movie::all();

        foreach ($movies as $movie) {
            $movie->director_id = $faker->randomElement($directorsIds);
            $movie->save();
        }
    }
}
