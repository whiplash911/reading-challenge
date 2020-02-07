<div class="card mt-2">
    <div class="card-header d-flex justify-content-between">
        <p class="mb-0"><span class="font-weight-bold">{{ $challenge->user->name }}</span> started a challenge!</p>
        <span>{{ Carbon\Carbon::parse($challenge->feed->created_at)->diffForHumans() }}</span>
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $challenge->user->id }}">{{ $challenge->user->name }}</a>
                </span>
                started a new challenge
                <span class="font-weight-bold">{{ $challenge->name }}</span>
            </h5>
            <a href="#" class="btn btn-outline-success">Join them</a>
        </div>
    </div>

    <div class="card-footer">
        <a href="#" class="btn btn-outline-primary">Like</a>
        <a href="#" class="btn btn-outline-primary">Comment</a>
    </div>
</div>
