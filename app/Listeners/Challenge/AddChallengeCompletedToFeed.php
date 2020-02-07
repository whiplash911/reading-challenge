<?php

namespace App\Listeners\Challenge;

use App\Events\ChallengeCompleted;

class AddChallengeCompletedToFeed
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
     * @param  ChallengeCompleted  $event
     * @return void
     */
    public function handle(ChallengeCompleted $event)
    {
        $challenge = $event->challenge;

        if ($challenge->isPublic()) {
            $challenge->feed()->create([
                'user_id' => $challenge->user->id,
                'event' => ChallengeCompleted::NAME
            ]);
        }
    }
}
