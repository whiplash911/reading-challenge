<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Challenge
 * @package App
 */
class Challenge extends Model
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

    /**
     * Marks a challenge as completed
     */
    public function complete()
    {
        $this->completed_at = date('Y-m-d H:i:s');
        $this->save();
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->completed_at !== null;
    }

}
