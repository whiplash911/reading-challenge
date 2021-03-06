<?php

namespace App\Listeners\Book;

use App\Events\BookCompleted;

class CompleteChallenge
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
     * The event contains the book and the challenge that the book belongs to
     *
     * @param  BookCompleted  $event
     * @return void
     */
    public function handle(BookCompleted $event)
    {
        $challenge = $event->challenge;

        if ($challenge->books->where('completed_at', '==', null)->count() === 0) { // If all books are completed
            $challenge->complete();
        }
    }
}
