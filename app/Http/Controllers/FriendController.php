<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    //

    public function searchPeople(Request $req) {
        $search = $req->search;
        $peoples = User::where('name', 'LIKE', "%$search%")->get();

        return view('peoples', ['peoples' => $peoples]);
    }

    public function sendFriendRequest($friend_id) {
        // Mengecek apakah sudah ada pertemanan dari user A dengan user B
        $alreadyFriend = Friend::where('user_id', Auth::user()->id)
                        ->where('friend_id', $friend_id)->first();

        if ($alreadyFriend === null) {
            // Jika tidak ada, maka mengecek apakah ada pertemanan dari user B dengan user A
            $alreadyFriend = Friend::where('user_id', $friend_id)
                            ->where('friend_id', Auth::user()->id)->first();

            if ($alreadyFriend === null) {
                // Mengecek apakah ada friend request dari user A pada user B
                $request = FriendRequest::where('user_id', Auth::user()->id)
                ->where('friend_id', $friend_id)->first();

                if ($request === null) {
                // Mengecek apakah ada friend request dari user B ke user A
                $request = FriendRequest::where('user_id', $friend_id)
                            ->where('friend_id', Auth::user()->id)->first();

                    // Apabila belum ada friend request
                    if ($request === null) {
                        // Mengecek apakah user A sudah mengirim friend request ke user B
                        $our_request = FriendRequest::where('user_id', Auth::user()->id)
                                    ->where('friend_id', $friend_id)->first();

                        // Jika user A belum mengirim friend request ke user B
                        if ($our_request === null) {
                            FriendRequest::insert([
                                'user_id' => Auth::user()->id,
                                'friend_id' => $friend_id
                            ]);
                            return 'Friend request sent successfully';
                        }

                        return 'Friend request has already sent before';
                    }
                    else {
                        // Apabila sudah ada friend request, maka hapus request tersebut dan tambahkan user tersebut menjadi teman
                        FriendRequest::where('id', $request->id)->delete([
                            'user_id' => Auth::user()->id,
                            'friend_id' => $friend_id
                        ]);

                        Friend::insert([
                            'user_id' => Auth::user()->id,
                            'friend_id' => $friend_id
                        ]);

                        return 'Friend has been added!';
                    }
                }
                return 'Already friend-1';
            }

            return 'Already friend-2';
        }

        return 'Already friend-3';
    }
}
