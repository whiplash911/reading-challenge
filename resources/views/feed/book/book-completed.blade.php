<div class="card mt-2">
    <div class="card-header d-flex justify-content-between">
        <span>{{ $book->challenge->user->name }}</span>
        <span>{{ Carbon\Carbon::parse($book->feed->created_at)->diffForHumans() }}</span>
    </div>

    <div class="card-body">
        <h5>
            <span class="font-weight-bold">{{ $book->challenge->user->name }}</span>
            successfully finished reading
            <span class="font-weight-bold">{{ $book->name }}</span>
        </h5>
    </div>
</div>
