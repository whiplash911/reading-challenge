<div class="card mt-2">
    <div class="card-header d-flex justify-content-between">
        <span>{{ $challenge->user->name }}</span>
        <span>{{ Carbon\Carbon::parse($challenge->feed->created_at)->diffForHumans() }}</span>
    </div>

    <div class="card-body">
        <h5>
            <span class="font-weight-bold">{{ $challenge->user->name }}</span>
            started a new challenge
            <span class="font-weight-bold">{{ $challenge->name }}</span>
        </h5>
    </div>
</div>
