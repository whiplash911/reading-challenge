@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <strong>Your challenges</strong>

                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between my-2">
                            <a href="/challenges/create" class="btn btn-success">Create new Challenge</a>
                            <a href="/" class="btn btn-primary">Back</a>
                        </div>
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
                                    <small>Progress: {{ $challenge->books->where('completed_at', '!=', null)->count() .' out of '. $challenge->books->count() . ' books completed'}}</small>
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
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
