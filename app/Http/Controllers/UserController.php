<?php

namespace App\Http\Controllers;

use App\Entry;
use App\HiddenTweets;
use App\HiddenTweets as HiddenTweetsAlias;
use App\User;
use DG\Twitter\Exception;
use DG\Twitter\Twitter;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    /** @var Twitter */
    private $twitterClient;

    /** @var HiddenTweetsAlias */
    private $hiddenTweets;

    public function __construct(Twitter $twitterClient, HiddenTweets $hiddenTweets)
    {
        $this->hiddenTweets = $hiddenTweets;
        $this->twitterClient = $twitterClient;
    }

    public function showUserEntries(User $user): View
    {
        $entries = Entry::with('user')->where('user_id', '=', $user->id)->paginate(3);
        $userTweets = $this->getUserTweets($user->twitter_username);
        $markedTweets = $this->markHiddenTweets($userTweets, $user->id);

        return view('user.entries', ['entries' => $entries, 'user' => $user, 'tweets' => $markedTweets]);
    }

    private function getUserTweets(string $twitterUserName = ''): array
    {
        if (empty($twitterUserName)) {
            return [];
        }
        try {
            return $this->twitterClient->request('/statuses/user_timeline.json', 'GET', [
                'count' => 5,
                'screen_name' => $twitterUserName,
                'exclude_replies' => true,
            ]);
        } catch (Exception $e) {
            report($e);

            return [];
        }
    }

    private function markHiddenTweets(array $tweets, int $userId): array
    {
        $hiddenTweets = $this->hiddenTweets::with('user')
            ->where('user_id', '=', $userId)
            ->get(['tweet_id'])
            ->map(function (HiddenTweets $item) {
                return $item->tweet_id;
            })->toArray();

        foreach ($tweets as $tweet) {
            $tweet->hidden = in_array($tweet->id, $hiddenTweets, false) ? true : false;
        }

        return $tweets;
    }
}
