<?php

namespace App\Http\Controllers;

use App\Entry;
use App\User;
use DG\Twitter\Exception;
use DG\Twitter\Twitter;
use Illuminate\View\View;

class UserController extends Controller
{
    /** @var Twitter */
    private $twitterClient;

    public function __construct(Twitter $twitterClient)
    {
        $this->twitterClient = $twitterClient;
    }

    public function showUserEntries(User $user): View
    {
        $entries = Entry::with('user')->where('user_id', '=', $user->id)->paginate(3);
        $userTweets = $this->getUserTweets($user->twitter_username);
        return view('user.entries', ['entries' => $entries, 'user' => $user, 'tweets' => $userTweets]);
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
}
