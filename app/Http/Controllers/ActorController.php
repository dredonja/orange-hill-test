<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Actor;

class ActorController extends Controller
{
    public function getActors()
    {
        $actors = Actor::all();

        return view('content.actors', compact('actors'));
    }

    public function getActorDetails($id)
    {
        $actor = Actor::whereId($id)->with('movies')->first();

        return $actor;
    }
}
