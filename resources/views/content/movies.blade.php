@extends('layout')

@section('content')

<div class="container">
    <table class="table table-hover" id="movies-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Year Of Release</th>
                <th>Director</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->year_of_release }}</td>
                    <td>{{ $movie->director->first_name }} {{ $movie->director->last_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('post.movies') }}">
        <div class="form-group">
            <label for="name">Movie Name <span class="error error-name alert-danger"></span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Movie Name">
        </div>
        <div class="form-group">
            <label for="year">Year of Release <span class="error error-year alert-danger"></span></label>
            <input type="text" class="form-control" id="year" name="year" placeholder="Year of Release">
        </div>
    {{--     <div class="form-group">
            <label for="exampleInputFile">Director <span class="error error-director alert-danger"></span></label>
            <select class="form-control" id="director" name="director">
                    <option value="0">-- Pick Director --</option>
                @foreach($directors as $director)
                    <option value="{{ $director->id }}">{{ $director->last_name }} {{ $director->first_name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group">
            <label for="director-search">Director by Search <span class="error error-director alert-danger"></label>
            <input type="text" class="form-control" id="director-search" name="director-search" placeholder="Search Director">
            <input id="director_id" type="hidden" name="director">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-default btnAjax">Add New Movie</button>
    </form>
    <br>
        <div class="alert  results hide"></div>
    <br>
    <br>
    <br>
    <br>
</div>

@stop
