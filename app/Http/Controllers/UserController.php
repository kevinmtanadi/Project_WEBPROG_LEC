<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // ---------------------------------------------------------------- SHOW PAGE --------------------------------------------------------------
    public function showPost() {
        $user = Auth::user();

        $friends = Friend::where('user_id', $user->id)
            ->get();
        $friends_id = [];
        foreach ($friends as $friend) {
            array_push($friends_id, $friend->id);
        }

        $posts = Post::where('user_id', $user->id)
            ->orWhereIn('user_id', $friends_id)->orderBy('posted_at', 'desc')
            ->get();

        return view('home', ['posts' => $posts]);
    }

    public function homepage(Request $req) {
        if (Auth::check()) {
            return $this->showPost();
        }
        else {
            return view('unlogged');
        }
    }



    // ---------------------------------------------------------------- REGISTER ---------------------------------------------------------------
    public function register(Request $req) {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ];

        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        User::insert([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'gender' => $req->gender,
            'dob' => $req->dob,
            'profile_pic' => 'profile.jpg',
            'banner_pic' => 'banner.jpg',
            'created_at' => Carbon::now(),
        ]);

        $user = User::where('email', $req->email)->first();

        Auth::loginUsingId($user->id);

        return redirect('/');
    }

    // ---------------------------------------------------------------- LOGIN ---------------------------------------------------------------
    public function login(Request $req) {
        $credentials = [
            'email' => $req->email_login,
            'password' => $req->password_login
        ];

        if (Auth::attempt($credentials, true)) {
            if($req->remember) {
                Cookie::queue('mycookie', $req->email, 120);
            }
            Session::put('mysession', $credentials);
            return redirect('/');
        }

        else {
            return redirect()->back()->withInput($req->only('email', 'remember'))->withErrors([
                'approve' => 'Email or password is incorrect'
            ]);
        }

        return redirect('/');
    }

    // ---------------------------------------------------------------- LOGOUT ----------------------------------------------------------------
    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    // ---------------------------------------------------------------- UPDATE ---------------------------------------------------------------
    public function update(Request $req) {

    }

}
