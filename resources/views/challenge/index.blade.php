@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <strong>Your challenges</strong>
                        <a href="/home" class="btn btn-primary">Back</a>
                    </div>

                    <div class="card-body">
                    @if($challenges->count() > 0)
                        <ul class="list-group">
                        @foreach($challenges as $challenge)
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <p class="mb-0">
                                        <strong>{{ $challenge->name }}</strong>
                                        @if($challenge->isCompleted())
                                        <i class="fas fa-check"></i>
                                        @endif
                                    </p>
                                    <small>Progress: {{ $challenge->books->where('completed_at', '!=', null)->count() .'/'. $challenge->books->count()}}</small>
                                </div>

                                <div>
                                    <a href="/challenges/{{ $challenge->id }}" class="btn btn-primary">View</a>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    @else
                        <div>
                            <p>You don't have any Challenges yet, lets create one!</p>
                            <a href="/challenges/create" class="btn btn-success">Create new Challenge</a>
                        </div>
                    @endif
                    </div>

                    <div class="card-footer">
                        <a href="/challenges/create" class="btn btn-success">Create new Challenge</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
