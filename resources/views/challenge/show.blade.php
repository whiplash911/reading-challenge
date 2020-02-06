@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <strong>{{ $challenge->name }}</strong>
                        <a href="/challenges" class="btn btn-primary">Back</a>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($challenge->books as $book)
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>{{ $book->name }}</strong>
                                    @if($book->isCompleted())
                                        Completed
                                    @else
                                    <div>
                                        <form action="/books/complete/{{ $book->id }}" method="PATCH">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-outline-success">Complete</button>
                                        </form>
                                    </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                    @if($challenge->isCompleted())
                        The challenge was completed on {{ $challenge->completed_at }}. Congratulations!
                    @else
                        <form action="/challenges/{{ $challenge->id }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-small btn-outline-danger" type="submit">Delete Challenge</button>
                        </form>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
