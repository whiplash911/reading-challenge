@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new Challenge</div>

                    <div class="card-body">
                        <form action="/challenges" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="question">Name</label>
                                <input name="challenge[name]" value="{{ old('challenge.name') }}" type="text" class="form-control" id="question"
                                       aria-describedby="challengeHelp" placeholder="Enter name" >
                                <small id="challengeHelp" class="form-text text-muted">Enter your challenge name!</small>

                                @error('challenge.name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <fieldset>
                                    <legend>Books</legend>
                                    <small id="booksHelp" class="form-text text-muted">Enter the titles of the books you want to read</small>

                                    <div class="form-group">
                                        <label for="name1"></label>
                                        <input name="books[][name]" value="{{ old('books.0.name') }}" type="text" class="form-control" id="name1"
                                               aria-describedby="booksHelp" placeholder="Enter Book 1" >

                                        @error('books.0.name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name2"></label>
                                        <input name="books[][name]" value="{{ old('books.1.name') }}" type="text" class="form-control" id="name2"
                                               aria-describedby="booksHelp" placeholder="Enter Book 2" >

                                        @error('books.1.name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name3"></label>
                                        <input name="books[][name]" value="{{ old('books.2.name') }}" type="text" class="form-control" id="name3"
                                               aria-describedby="booksHelp" placeholder="Enter Book 3" >

                                        @error('books.2.name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name4"></label>
                                        <input name="books[][name]" value="{{ old('books.3.name') }}" type="text" class="form-control" id="name4"
                                               aria-describedby="booksHelp" placeholder="Enter Book 4" >

                                        @error('books.3.name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Challenge</button>
                        </form>
                    </div>

                    <div class="card-footer">
                        <a href="/challenges" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
