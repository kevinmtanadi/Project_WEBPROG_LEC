<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    //

    public function searchPeople(Request $req) {
        $search = $req->search;
        $peoples = User::where('name', 'LIKE', "%$search%")->get();

        return view('peoples', ['peoples' => $peoples]);
    }
}
