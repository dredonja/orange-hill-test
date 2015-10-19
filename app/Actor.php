<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';

    public $timestamps = false;

    public function movies()
    {
        return $this->belongsToMany('App\Movie', 'actors_to_movies', 'actor_id', 'movie_id');
    }

}
