<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'directors';

    public $timestamps = false;

    public function movies()
    {
        return $this->hasMany('App\Movie', 'director_id', 'id');
    }

    public static function search($queryString)
    {
        $directors = Director::where('first_name', 'like', "%{$queryString}%")
                            ->orWhere('last_name', 'like', "%{$queryString}%")
                            ->get();

        return $directors;
    }
}
