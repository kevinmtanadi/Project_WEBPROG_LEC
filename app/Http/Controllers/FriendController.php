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

    public function showFriend() {
        return view('friend');
    }

    public function searchPeople(Request $req) {
        $search = $req->search;
        $peoples = User::where('name', 'LIKE', "%$search%")
                ->where('id', '!=', Auth::user()->id)
                ->where('role', '!=', 'admin')
                ->get();

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
                        }
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

                        Friend::insert([
                            'user_id' => $friend_id,
                            'friend_id' => Auth::user()->id
                        ]);

                    }
                }
            }
        }

        return redirect()->back();
    }

    public function removeFriend($friend_id) {
        $friend = Friend::where('user_id', Auth::user()->id)
                ->where('friend_id', $friend_id)->first();

        $friend_2 = Friend::where('user_id', $friend_id)
                ->where('friend_id', Auth::user()->id)->first();


        Friend::where('id', $friend->id)->delete();
        Friend::where('id', $friend_2->id)->delete();

        return redirect()->back();
    }

    public function cancelFriendRequest($friend_id) {
        FriendRequest::where('friend_id', $friend_id)->delete();

        return redirect()->back();
    }

    public function showProfile($id) {
        $account = User::where('id', $id)->first();

        return view('profile', ['account' => $account]);
    }
}
