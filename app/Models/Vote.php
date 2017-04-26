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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id, user_ip'];

    /**
     * Return the number of votes left that the user has today.
     *
     * @return int $votes
     */
    public static function votesLeft()
    {

        $voteLimit = Constants::VOTES;
        $voteCount = count(self::where('user_id', Auth::user()->id)->get());
        $voteArray = self::where('user_id', Auth::user()->id)->get();

        self::voteIsExpired($voteArray);

        return $voteLimit - $voteCount;
    }

    /**
     * Save a vote record to the database.
     *
     * @param int $userId
     * @param int $userIp
     *
     * @return bool
     */
    public static function userVoted($userId, $userIp)
    {
        $vote = new self();
        $vote->user_id = $userId;
        $vote->user_ip = $userIp;
        $vote->save();
    }

    /**
     * If a vote was created >= 24 hours ago, delete the record.
     *
     * @return bool
     */
    public static function voteIsExpired($voteArray)
    {
        foreach ($voteArray as $vote) {
            $currentTimeStamp = time();
            $voteTimeStamp = strtotime($vote->toArray()['created_at']);

            dd($currentTimeStamp - $voteTimeStamp);
        }
    }
}
