<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Post;
use App\Models\PostLike;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //

    public function createPost(Request $req) {

        $validator = Validator::make($req->all(), [
            'content' => 'required|mimes:jpeg,jpg,png,webp',
            'caption' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $file = $req->file('content');
            $filename = 'post_'.time().'.'.$file->getClientOriginalExtension();

            Storage::putFileAs('public/images/post/', $file, $filename);

            $user = Auth::user();

            Post::insert([
                'user_id' => $user->id,
                'content_url' => $filename,
                'caption' => $req->caption,
                'posted_at' => Carbon::now(),
            ]);

        }

        return redirect()->back();
    }

    public function likePost($id) {
        $postLike = PostLike::where('post_id', $id)
                    ->where('user_id', Auth::user()->id)->first();

        if ($postLike == null) {
            PostLike::insert([
                'user_id' => Auth::user()->id,
                'post_id' => $id
            ]);
        }

        return redirect()->back();
    }

    public function unlikePost($id) {
        $postLike = PostLike::where('post_id', $id)
                    ->where('user_id', Auth::user()->id)->first();

        if ($postLike != null) {
            PostLike::where('id', $postLike->id)->delete();
        }

        return redirect()->back();
    }
}
