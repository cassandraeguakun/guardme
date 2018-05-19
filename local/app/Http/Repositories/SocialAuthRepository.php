<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 07/08/2017
 * Time: 03:08 PM
 */

namespace Responsive\Http\Repositories;


use Illuminate\Http\Request;
use \Socialite;
use Responsive\User;

class SocialAuthRepository
{
   
    private $socialite;


    /**
     * SocialAuthRepository constructor.
     * @param Socialite $socialite
     */
    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }


    public function saveSocialDetail($detail)
    {
        $user = User::firstOrNew([
            'email' => $detail['email']
        ]);

        $detail['password'] = date('Ymd');
        if (!$user->id) {
            $newUser = $this->accountRepository->register($detail);
            $this->socialIdUpdate($newUser->id, $detail);
            return User::find($newUser->id);
        } else {
            return User::find($user->id);
        }

    }

    private function socialIdUpdate($userid, $detail)
    {
        switch ($detail['provider']) {
            case "twitter":
                $twitter = User::find($userid);
                $twitter->twit_id = $detail['id'];
                $twitter->save();
                break;
            case "facebook":
                $facebook = User::find($userid);
                $facebook->fb_id = $detail['id'];
                $facebook->save();
                break;
            case "google":
                $google = User::find($userid);
                $google->google_id = $detail['id'];
                $google->save();
                break;
            case "linkedin":
                $linkedin = User::find($userid);
                $linkedin->linkedin_id = $detail['id'];
                $linkedin->save();
                break;
            default:
                logger("Unknown Social Provider");
        };
    }


}