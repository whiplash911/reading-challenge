<?php

namespace App\Listeners\Book;

use App\Events\BookCompleted;

class AddToFeed
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
        $book = $event->book;

        if ($challenge->isPublic()) {
            $book->feed()->create([
                'user_id' => $challenge->user->id,
                'event' => BookCompleted::NAME
            ]);
        }
    }
}
