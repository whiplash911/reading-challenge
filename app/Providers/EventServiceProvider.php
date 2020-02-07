<?php

namespace App\Providers;

use App\Events\{BookCompleted, ChallengeCompleted, ChallengeCreated};
use App\Listeners\Challenge\{AddChallengeCompletedToFeed, AddChallengeCreatedToFeed};
use App\Listeners\Book\{CompleteChallenge, AddToFeed as AddBookToFeed};
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BookCompleted::class => [
            CompleteChallenge::class,
            AddBookToFeed::class
        ],
        ChallengeCompleted::class => [
            AddChallengeCompletedToFeed::class
        ],
        ChallengeCreated::class => [
            AddChallengeCreatedToFeed::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
