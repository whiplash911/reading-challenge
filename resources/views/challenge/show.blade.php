@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <strong>{{ $challenge->name }}</strong>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($challenge->books as $book)
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>{{ $book->name }}</strong>
                                    @if($book->isCompleted())
                                    <span class="text-success">Completed</span>
                                    @else
                                    <div>
                                        <form action="/books/complete/{{ $book->id }}" method="PATCH">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-outline-primary">Complete</button>
                                        </form>
                                    </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                    @if($challenge->isCompleted())
                        <p>The challenge was completed on {{ $challenge->completed_at }}. Congratulations!</p>
                    @else
                        <form action="/challenges/{{ $challenge->id }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-small btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete the challenge?')">Delete Challenge</button>
                        </form>
                    @endif
                        <a href="/challenges" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
