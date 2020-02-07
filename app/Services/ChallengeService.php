<?php

namespace App\Services;

use App\Challenge;
use App\Events\ChallengeCreated;

/**
 * Class ChallengeService
 * @package App\Services
 */
class ChallengeService
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create($data)
    {
        $challenge = auth()->user()->challenges()->create($data['challenge']);
        $challenge->books()->createMany($data['books']);

        event(new ChallengeCreated($challenge));

        return $challenge;
    }

    /**
     * @param Challenge $challenge
     * @throws \Exception
     */
    public function delete(Challenge $challenge)
    {
        $challenge->books()->delete();
        $challenge->delete();
    }
}
