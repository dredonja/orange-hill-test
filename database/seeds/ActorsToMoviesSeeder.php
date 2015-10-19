<?php

use Illuminate\Database\Seeder;
use App\Actor;
use App\Movie;

class ActorsToMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $actorsIds = Actor::lists('id')->toArray();
        $moviesIds = Movie::lists('id')->toArray();

        foreach(range(1, 3000) as $index)
        {
            DB::table('actors_to_movies')->insert([
               'actor_id' => $faker->randomElement($actorsIds),
               'movie_id' => $faker->randomElement($moviesIds),
            ]);
        }
    }

}
