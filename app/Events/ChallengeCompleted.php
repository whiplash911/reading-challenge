<?php

namespace App\Events;

use App\Challenge;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChallengeCompleted
{
    use Dispatchable, SerializesModels;

    const NAME = 'challenge-completed';

    /**
     * @var Challenge
     */
    public $challenge;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Challenge $challenge)
    {
        $this->challenge = $challenge;
    }
}
