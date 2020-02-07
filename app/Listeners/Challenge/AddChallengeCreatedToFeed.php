<?php

namespace App\Listeners\Challenge;

use App\Events\ChallengeCompleted;
use App\Events\ChallengeCreated;

class AddChallengeCreatedToFeed
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChallengeCreated  $event
     * @return void
     */
    public function handle(ChallengeCreated $event)
    {
        $challenge = $event->challenge;

        if ($challenge->isPublic()) {
            $challenge->feed()->create([
                'user_id' => $challenge->user->id,
                'event' => ChallengeCreated::NAME
            ]);
        }
    }
}
