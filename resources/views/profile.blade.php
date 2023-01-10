<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layout.navbar')

    <div class="container my-5">
        <div class="my-3">
            <div class="row mb-5 mx-5">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <img class="profile-3" src="{{Storage::url('public/images/profile/'.$account->profile_pic)}}" alt="">
                </div>
                <div class="col-9">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fs-3 fw-light">{{$account->name}}</span>
                        @if (Auth::user()->id != $account->id)
                        @php
                           $friends = Auth::user()->friends;
                           $friends_id = [];
                            foreach ($friends as $friend) {
                                array_push($friends_id, $friend->friend_id);
                            }

                            $friend_reqs = Auth::user()->friendRequests;
                            $friend_reqs_id = [];
                            foreach ($friend_reqs as $friend_req) {
                                array_push($friend_reqs_id, $friend_req->friend_id);
                            }
                        @endphp
                        <div class="me-5">
                            @if (in_array($account->id, $friends_id))
                                <a class="btn btn-danger" href="/removeFriend/{{$account->id}}">Unfriend</a>
                            @elseif (in_array($account->id, $friend_reqs_id))
                                <a class="btn btn-secondary" href="/cancelFriendRequest/{{$account->id}}">Friend Request Sent</a>
                            @else
                                <a class="btn btn-3" href="/addFriend/{{$account->id}}">Add Friend</a>
                            @endif
                        </div>
                        @else
                        <div class="d-flex align-items-center">
                            <a href="/updateProfile"><i class="fa-solid fa-gear fs-4 text-secondary"></i></a>
                        </div>
                        @endif
                    </div>
                    <div class="row align-items-end align-items-center">
                        <div class="col-2">
                            <span class="fs-4 me-1">{{$account->posts->count()}}</span><span class="fw-light">posts</span>
                        </div>
                        <div class="col-2">
                            <span class="fs-4 me-1">{{$account->friends->count()}}</span><span class="fw-light">friends</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="grid">
                @foreach ($account->posts as $post)
                <button type="button" class="grid-item border-0 hover-none focus-none bg-0 mx-1" data-bs-toggle="modal" data-bs-target="#commentModal{{$post->id}}" >
                    <img class="grid-image" src="{{Storage::url('public/images/post/'.$post->content_url)}}" alt="">
                </button>
                <div class="modal fade" id="commentModal{{$post->id}}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                      <div class="modal-content">
                            <div class="modal-body row p-0">
                                <div class="content col-6 px-0 d-flex">
                                    <img class="img-fluid post-content mx-auto" src="{{Storage::url('public/images/post/'.$post->content_url)}}" alt="">
                                </div>
                                <div class="comment-holder col-6">
                                    <div class="comment-profile d-flex">
                                        <div class="py-2">
                                            <img class="profile mx-2 my-auto" src="{{Storage::url('public/images/profile/'.$post->user->profile_pic)}}" alt="">
                                            {{ $post->user->name }}
                                        </div>
                                    </div>
                                    <div class="comments">
                                        @foreach ($post->comments as $comment)
                                        <div class="row py-2">
                                            <div class="col-1 me-3">
                                                <img class="profile mx-2" src="{{Storage::url('public/images/profile/'.$comment->user->profile_pic)}}" alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="comment-content"><span class="fw-semibold">{{ $comment->user->name }}</span> {{ $comment->comment}}</div>
                                                @php
                                                $time_passed = \Carbon\Carbon::now()->diffInSeconds($comment->posted_at);
                                                $time = '';
                                                if ($time_passed < 60) {
                                                    $time = floor($time_passed).'s';
                                                }
                                                else if ($time_passed < 60*60){
                                                    $time = floor($time_passed / (60)).'m';
                                                }
                                                else if ($time_passed < 24*60*60) {
                                                    $time = floor($time_passed / (24*60)).'h';
                                                }
                                                else if ($time_passed < 7*24*60*60) {
                                                    $time = floor($time_passed / (7*24*60)).'d';
                                                }
                                                else {
                                                    $time = dd($post->posted_at->toDateString());
                                                }
                                                @endphp
                                                <div class="d-flex">
                                                    <span class="comment-status me-2">{{ $time }}</span>
                                                    @if ($comment->likes->count() > 1)
                                                    <span class="comment-status fw-semibold">{{ $comment->likes->count() }} likes</span>
                                                    @elseif ($comment->likes->count() > 0)
                                                    <span class="comment-status fw-semibold">{{ $comment->likes->count() }} like</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                @php
                                                $likedComment = [];
                                                foreach (Auth::user()->commentLikes as $like) {
                                                    array_push($likedComment, $like->comment->id);
                                                }
                                                @endphp
                                                @if (in_array($comment->id, $likedComment))
                                                <a href="/unlikeComment/{{$comment->id}}" class="me-1">
                                                    <i class="fa-solid fa-heart fs-6 text-danger"></i>
                                                </a>
                                                @else
                                                <a href="/likeComment/{{$comment->id}}" class="me-1">
                                                    <i class="fa-regular fa-heart fs-6"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="comment-info py-3 pe-3">
                                        <div class="col d-flex align-items-center">
                                            @php
                                                $likedPost = [];
                                                foreach (Auth::user()->postLikes as $like) {
                                                    array_push($likedPost, $like->post->id);
                                                }
                                            @endphp
                                            @if (in_array($post->id, $likedPost))
                                            <a href="/unlikePost/{{$post->id}}" class="me-1">
                                                <i class="fa-solid fa-heart fs-4 text-danger"></i>
                                            </a>
                                            @else
                                            <a href="/likePost/{{$post->id}}" class="me-1">
                                                <i class="fa-regular fa-heart fs-4"></i>
                                            </a>
                                            @endif
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#commentModal" class="border-0 hover-none focus-none bg-0 mx-1">
                                                <i class="fa-regular fa-message fs-4"></i>
                                            </button>
                                        </div>
                                        <div class="status">
                                            {{ $post->likes->count() }} likes
                                        </div>
                                        <form action="/addComment/{{$post->id}}" method="POST" class="mt-3 d-flex">
                                            @csrf
                                            <textarea class="form-control" name="comment" id="comment" style="height: 28px" oninput="auto_grow(this);" placeholder="Add your comment"></textarea>
                                            <div class="d-flex ms-2">
                                                <input class="my-auto border-0 hover-none focus-none text-color-3" type="submit" value="Post">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>