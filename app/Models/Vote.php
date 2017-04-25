<?php

namespace App\Models;

use App\Meta\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'votes';

    /**
     * Find any voting records that exist in the votes table for the authenticated user.
     *
     * @return int
     */
    public static function getVoteRecord()
    {
        return count(self::where('user_id', Auth::user()->id)->get());
    }

    /**
     * Return true if the user has already voted today.
     *
     * @return bool
     */
    public static function alreadyVoted()
    {
        return self::getVoteRecord() == Constants::VOTES ? true : false;
    }

    /**
     * Return the number of votes left that the user has today.
     *
     * @return int $votes
     */
    public static function votesLeft()
    {
        $voteLimit = Constants::VOTES;
        $votes = count(self::where('user_id', Auth::user()->id)->get());

        return $voteLimit - $votes;
    }
}
