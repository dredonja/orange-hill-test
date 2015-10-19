<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Input;

class Movie extends Model
{
    protected $table = 'movies';

    public $timestamps = false;

    public function director()
    {
        return $this->belongsTo('App\Director', 'director_id', 'id');
    }

    public function moviesToActors()
    {
        return $this->belongsToMany('App\Actor', 'actors_to_movies', 'actor_id', 'movie_id');
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|unique:movies',
            'year'     => 'required|integer|min:1896|max:'.date('Y'),
            'director' => 'required|exists:directors,id',
        ]);
    }

    public function insertNewMovie()
    {
        $data = Input::all();

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return response()->json(
                $validator->getMessageBag()
            , 422);
        }

        $this->insert($data);

        $director = Director::find($data['director']);
        $directorFullName = $director->first_name.' '.$director->last_name;

        return response()->json([
            'success' => true,
            'message' => 'New movie is successfully added!',
            'data'    => [
                            'name'     => $data['name'],
                            'year'     => $data['year'],
                            'director' => $directorFullName,
                        ],
        ], 200);
    }

    protected function insert(Array $data)
    {
        $movie = new Movie;

        $movie->name            = $data['name'];
        $movie->year_of_release = $data['year'];
        $movie->director_id     = $data['director'];

        return $movie->save();
    }
}
