@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{ Breadcrumbs::render('profile', $user) }}

                <h5>{{ $user->name }}'s profile</h5>
                <div class="card mt-4">
                    <div class="card-header">
                        Challenges
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="bg-primary p-2 text-white rounded-sm">
                                Challenges: <span class="badge badge-light">{{ $user->challenges->count() }}</span>
                            </p>
                            <p class="bg-success p-2 text-white rounded-sm">
                                Completed challenged: <span class="badge badge-light">{{ $user->challenges->where('completed_at', '!=', null)->count() }}</span>
                            </p>
                        </div>

                        @foreach($user->challenges()->orderBy('created_at', 'desc')->get() as $challenge)
                            @if($challenge->isPublic())
                            <div class="my-2">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a class="btn" data-toggle="collapse" href="#challengeCollapse{{$challenge->id}}" aria-expanded="false" aria-controls="challengeCollapse{{$challenge->id}}">
                                            <h4>
                                                {{ $challenge->name }}
                                            </h4>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="collapse pl-0" id="challengeCollapse{{$challenge->id}}">
                                @foreach($challenge->books as $book)
                                    <li class="list-group-item">
                                        <strong>{{ $book->name }}</strong>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="mb-4">Activity</h5>

                    @foreach($user->feeds as $feed)
                        {{ $feed->feedable->render() }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
