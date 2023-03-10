<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layout.navbar')

    <div class="mx-4 my-3">
        <div class="row">
            <div class="col-xl-4 col-lg-3 col-0">

            </div>
            <div class="col-xl-4 col-lg-6 col-sm-8 col-12 posts">
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="profile d-flex">
                            <a href="/profile/{{$post->user->id}}">
                                <div class="p-2">
                                    <img class="profile mx-2" src="{{Storage::url('public/images/profile/'.$post->user->profile_pic)}}" alt="">
                                    {{ $post->user->name }}
                                </div>
                            </a>
                        </div>
                        <div class="">
                            <img class="img-fluid w-100" src="{{Storage::url('public/images/post/'.$post->content_url)}}" alt="">
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mb-2">
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#commentModal{{$post->id}}" class="border-0 hover-none focus-none bg-0 mx-1">
                                        <i class="fa-regular fa-message fs-4"></i>
                                    </button>
                                </div>
                                <div class="col d-flex flex-row-reverse align-items-center">

                                </div>
                            </div>
                            <div class="status">
                                {{ $post->likes->count() }} {{ __('home.like') }}
                            </div>
                            <div class="card-text">
                                <div class="">
                                    <span class="fw-semibold">{{ $post->user->name }}</span> {{ $post->caption }}
                                </div>
                                <div class="">
                                    @php
                                    $time_passed = \Carbon\Carbon::now()->diffInSeconds($post->posted_at);
                                    $time = '';
                                    if ($time_passed < 60) {
                                        $time = floor($time_passed).'s';
                                    }
                                    else if ($time_passed < 60*60){
                                        $time = floor($time_passed / (60)).'m';
                                    }
                                    else if ($time_passed < 24*60*60) {
                                        $time = floor($time_passed / (60*60)).'h';
                                    }
                                    else if ($time_passed < 7*24*60*60) {
                                        $time = floor($time_passed / (24*60*60)).'d';
                                    }
                                    else {
                                        $time = date('j M Y', strtotime($post->posted_at));
                                    }
                                    @endphp
                                    <span class="comment-status">{{ $time }}</span>
                                </div>
                            </div>
                            <div class="comment mt-3">
                                <form action="/addComment/{{$post->id}}" method="POST" class="mt-3 d-flex">
                                    @csrf
                                    <textarea class="form-control" name="comment" id="comment" style="height: 28px" oninput="auto_grow(this);" placeholder="{{__('home.comment')}}"></textarea>
                                    <div class="d-flex ms-2">
                                        <input class="my-auto border-0 hover-none focus-none text-color-3" type="submit" value="Post">
                                    </div>
                                </form>
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
                                                            <span class="fw-semibold">
                                                                {{ $post->user->name }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="comments">
                                                        <div class="row py-2">
                                                            <div class="col-1 me-3">
                                                                <img class="profile mx-2" src="{{Storage::url('public/images/profile/'.$post->user->profile_pic)}}" alt="">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="comment-content"><span class="fw-semibold">{{$post->user->name}}</span> {{$post->caption}}</div>
                                                                @php
                                                                $time_passed = \Carbon\Carbon::now()->diffInSeconds($post->posted_at);
                                                                $time = '';
                                                                if ($time_passed < 60) {
                                                                    $time = floor($time_passed).'s';
                                                                }
                                                                else if ($time_passed < 60*60){
                                                                    $time = floor($time_passed / (60)).'m';
                                                                }
                                                                else if ($time_passed < 24*60*60) {
                                                                    $time = floor($time_passed / (60*60)).'h';
                                                                }
                                                                else if ($time_passed < 7*24*60*60) {
                                                                    $time = floor($time_passed / (24*60*60)).'d';
                                                                }
                                                                else {
                                                                    $time = date('j M Y', strtotime($post->posted_at));
                                                                }
                                                                @endphp
                                                                <span class="comment-status me-2">{{ $time }}</span>
                                                            </div>
                                                            @foreach ($post->comments as $comment)
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
                                                                    $time = floor($time_passed / (60*60)).'h';
                                                                }
                                                                else if ($time_passed < 7*24*60*60) {
                                                                    $time = floor($time_passed / (24*60*60)).'d';
                                                                }
                                                                else {
                                                                    $time = date('j M Y', strtotime($post->posted_at));
                                                                }
                                                                @endphp
                                                                <div class="d-flex">
                                                                    <span class="comment-status me-2">{{ $time }}</span>
                                                                    @if ($comment->likes->count() > 0)
                                                                    <span class="comment-status fw-semibold">{{ $comment->likes->count() }} {{__('home.like')}}</span>
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
                                                            @endforeach
                                                        </div>

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
                                                            {{ $post->likes->count() }} {{__('home.like')}}
                                                        </div>
                                                        <form action="/addComment/{{$post->id}}" method="POST" class="mt-3 d-flex">
                                                            @csrf
                                                            <textarea class="form-control" name="comment" id="comment" style="height: 28px" oninput="auto_grow(this);" placeholder="{{__('home.comment')}}"></textarea>
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

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-4 col-0">
                @if (count($friend_reqs) > 0)
                <div class="mb-2">
                    <h5 class="fw-semibold mb-2">{{__('home.friend_req')}}</h5>
                    @foreach ($friend_reqs as $friend_req)
                    <div class="d-flex align-items-center justify-content-between">
                        <a class="mb-2" href="/profile/{{$friend_req->user->id}}">
                            <img class="profile-2 me-2" src="{{Storage::url('public/images/profile/'.$friend_req->user->profile_pic)}}" alt="">
                            {{ $friend_req->user->name }}
                        </a>
                        <a class="btn btn-3" href="/addFriend/{{$friend_req->user->id}}">Accept</a>
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="mb-2">
                    <h5 class="fw-semibold mb-2">{{__('home.friend')}}</h5>
                    @foreach (Auth::user()->friends as $friend)
                    <div class="d-flex align-items-center">
                        <a class="mb-2" href="/profile/{{$friend->friend->id}}">
                            <img class="profile-2 me-2" src="{{Storage::url('public/images/profile/'.$friend->friend->profile_pic)}}" alt="">
                            {{ $friend->friend->name }}
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    @include('layout.footer')

</body>
</html>