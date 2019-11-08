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

    public function unhideTweet(HiddenTweets $tweet): Response
    {
        $this->hiddenTweets->tweet_id = $tweet->tweet_id;
        $this->hiddenTweets->user_id = Auth::user()->id;
        $this->hiddenTweets->delete();
        return response('', '200');
    }
}
