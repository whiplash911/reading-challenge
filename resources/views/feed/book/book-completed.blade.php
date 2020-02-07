<div class="card mt-2">
    <div class="card-header d-flex justify-content-between">
        <p class="mb-0"><span class="font-weight-bold">{{ $book->challenge->user->name }}</span> finished a book!</p>
        <span>{{ Carbon\Carbon::parse($book->feed->created_at)->diffForHumans() }}</span>
    </div>

    <div class="card-body">
        <h5>
            <span class="font-weight-bold">
                <a href="/profile/{{ $book->challenge->user->id }}">{{ $book->challenge->user->name }}</a>
            </span>
            successfully finished reading
            <span class="font-weight-bold">{{ $book->name }}</span>
        </h5>
    </div>

    <div class="card-footer">
        <a href="#" class="btn btn-outline-primary">Like</a>
        <a href="#" class="btn btn-outline-primary">Comment</a>
    </div>
</div>
