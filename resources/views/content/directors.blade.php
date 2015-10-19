@extends('layout')

@section('content')

<div class="container">
    <table class="table table-hover">
        <tbody>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            @foreach($directors as $director)
                <tr>
                    <td>{{ $director->id }}</td>
                    <td><a class="ajax-directors" href="{{ route('get.directors.details', $director->id) }}"  data-target="#myModal" data-id="{{ $director->id }}">{{ $director->first_name }}</a></td>
                    <td><a class="ajax-directors" href="{{ route('get.directors.details', $director->id) }}"  data-target="#myModal" data-id="{{ $director->id }}">{{ $director->last_name }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Director Details</h4>
        </div>
            <div class="modal-body">
               <table class="table">
                        <thead>
                            <tr>
                                <th>Movie</th>
                                <th>Year of Release</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

@stop
