<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class SocialiteController extends Controller
{
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication(Request $request){
        $user = Socialite::driver('google')->user();
        // dd($user);

        //update for google login and create user for registration
        $user = User::updateOrCreate([
            'google_id'=>$user->id,
        ],
        [
            'name'=>$user->name,
            'email'=>$user->email,
            'password'=>bcrypt('12345678'),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
