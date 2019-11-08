<?php

namespace App\Http\Controllers;

use App\HiddenTweets;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
{
    /** @var HiddenTweets */
    private $hiddenTweets;

    public function __construct(HiddenTweets $hiddenTweets)
    {
        $this->hiddenTweets = $hiddenTweets;
    }

    public function hideTweet(int $id): Response
    {
        $this->hiddenTweets->tweet_id = $id;
        $this->hiddenTweets->user_id = Auth::user()->id;
        $this->hiddenTweets->save();

        return response('', '201');
    }

    public function unhideTweet(int $id): Response
    {
        $result = $this->hiddenTweets::with('user')
            ->where('user_id', '=', Auth::user()->id)
            ->where('tweet_id', '=', $id)->delete();

        return response('', $result > 0 ? 200 : 404);
    }
}
