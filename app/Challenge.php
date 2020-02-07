<?php

namespace App;

use App\Events\BookCompleted;
use App\Events\ChallengeCompleted;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Challenge
 * @package App
 */
class Challenge extends Model implements Feedable
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function feed()
    {
        return $this->morphOne(Feed::class, 'feedable');
    }

    /**
     * Marks a challenge as completed
     */
    public function complete()
    {
        $this->completed_at = date('Y-m-d H:i:s');

        $this->save();

        event(new ChallengeCompleted($this));
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->completed_at !== null;
    }

    public function isPublic()
    {
        // Check if the challenge is public return $this->public;
        return true;
    }

    public function render()
    {
        $challenge = $this;

        return view('feed.challenge.'.$challenge->feed->event, compact('challenge'));
    }
}
