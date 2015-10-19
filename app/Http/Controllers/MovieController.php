<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Director;

class MovieController extends Controller
{
    public function getMovies()
    {
        $movies    = Movie::all();
        $directors = Director::orderBy('last_name', 'ASC')->get();

        return view('content.movies', compact('movies', 'directors'));
    }

    public function postMovies()
    {
        return (new Movie)->insertNewMovie();
    }

    public function years()
    {
        return (new Movie)->dropDownMenuYearGenerator();
    }
}
