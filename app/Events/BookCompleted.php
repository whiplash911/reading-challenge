<?php

namespace App\Events;

use App\Book;
use App\Challenge;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class BookCompleted
 * @package App\Events
 */
class BookCompleted
{
    use Dispatchable, SerializesModels;

    /**
     * @var Book
     */
    public $book;
    /**
     * @var Challenge
     */
    public $challenge;

    /**
     * BookCompleted constructor.
     *
     * @param Book      $book
     * @param Challenge $challenge
     */
    public function __construct(Book $book, Challenge $challenge)
    {
        $this->book = $book;
        $this->challenge = $challenge;
    }
}
