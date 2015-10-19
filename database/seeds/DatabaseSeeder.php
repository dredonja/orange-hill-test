<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(App\Actor::class, 1000)->create()->make();

        factory(App\Director::class, 200)->create()->make();

        factory(App\Movie::class, 500)->create()->make();

        $this->call(ActorsToMoviesSeeder::class);

        $this->call(MovieDirectorIdSeeder::class);

        Model::reguard();
    }
}
