<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentLike;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //

    public function addComment(Request $req, $post_id) {
        $validator = Validator::make($req->all(), [
            'comment' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        Comment::insert([
            'user_id' => Auth::user()->id,
            'post_id' => $post_id,
            'comment' => $req->comment,
            'posted_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function likeComment(Request $req, $comment_id) {
        $commentLike = CommentLike::where('comment_id', $comment_id)
                    ->where('user_id', Auth::user()->id)->first();

        if ($commentLike == null) {
            CommentLike::insert([
                'user_id' => Auth::user()->id,
                'comment_id' => $comment_id
            ]);
        }

        return redirect()->back();
    }

    public function unlikeComment(Request $req, $comment_id) {
        $commentLike = CommentLike::where('comment_id', $comment_id)
                    ->where('user_id', Auth::user()->id)->first();

        if ($commentLike != null) {
            CommentLike::where('id', $commentLike->id)->delete();
        }

        return redirect()->back();
    }
}
