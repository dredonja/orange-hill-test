@extends('layout')

@section('content')

<div class="container">
    <table class="table table-hover">
        <tbody>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            @foreach($actors as $actor)
                <tr>
                    <td>{{ $actor->id }}</td>
                    <td><a data-id="{{ $actor->id }}" class="ajax-actors" href="{{ route('get.actors.details', $actor->id) }}" data-target="#myModal">{{ $actor->first_name }}</a></td>
                    <td><a data-id="{{ $actor->id }}" class="ajax-actors" href="{{ route('get.actors.details', $actor->id) }}" data-target="#myModal">{{ $actor->last_name }}</a></td>
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
                <h4 class="modal-title" id="myModalLabel">Actor Details</h4>
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
