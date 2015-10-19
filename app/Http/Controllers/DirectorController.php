<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Director;
use Input;

class DirectorController extends Controller
{
    public function getDirectors()
    {
        $directors = Director::all();

        return view('content.directors', compact('directors'));
    }

    public function getDirectorDetails($id)
    {
        $director = Director::whereId($id)->with('movies')->first();

        return $director;
    }

    public function searchDirectors()
    {
        $queryString = Input::get('query');

        return Director::search($queryString);
    }
}
