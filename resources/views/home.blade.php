@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="/challenges/create" class="btn btn-success">Create new Challenge</a>
                        <a href="/challenges" class="btn btn-primary">View you Challenges</a>
                    </div>
                </div>
            </div>

            @if(!empty($feed))
                <div class="my-3">
                    <h1>User Activity</h1>
                    @foreach($feed as $feedItem)
                        {{ $feedItem->feedable->render() }}
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
