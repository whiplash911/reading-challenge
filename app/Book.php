<?php

namespace App;

use App\Events\BookCompleted;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @package App
 */
class Book extends Model implements Feedable
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function feed()
    {
        return $this->morphOne(Feed::class, 'feedable');
    }

    /**
     * Marks a book as completed
     */
    public function complete()
    {
        $this->completed_at = date('Y-m-d H:i:s');

        $this->save();

        event(new BookCompleted($this, $this->challenge));
    }

    /**
     * @return bool
     */
    public function isCompleted()
    {
        return $this->completed_at !== null;
    }

    public function render()
    {
        $book = $this;

        return view("feed.book.{$book->feed->event}", compact('book'));
    }
}
