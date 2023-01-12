<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Friends</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layout.navbar')

    <div class="container my-3 d-flex">
        <div class="row">
        @foreach (Auth::user()->friends as $friend)

            <div class="col-12">
                <div class="card mx-auto" style="min-width: 600px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 d-flex justify-content-center">
                                <a href="/profile/{{$friend->friend->id}}">
                                    <img class="people-profile" src="{{Storage::url('public/images/profile/'.$friend->friend->profile_pic)}}" alt="test">
                                </a>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <a href="/profile/{{$friend->friend->id}}">
                                    <span class="fw-semibold">{{ $friend->friend->name }}</span>
                                </a>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <div class="text-end my-auto">
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
                                    @if (in_array($friend->id, $friends_id))
                                        <a class="btn btn-danger" href="/removeFriend/{{$friend->id}}">{{__('people.remove_friend')}}</a>
                                    @elseif (in_array($friend->id, $friend_reqs_id))
                                        <a class="btn btn-secondary" href="/cancelFriendRequest/{{$friend->id}}">{{__('people.friend_req')}}</a>
                                    @else
                                        <a class="btn btn-3" href="/addFriend/{{$friend->id}}">{{__('people.add_friend')}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach
        </div>
    </div>
    @include('layout.footer')

</body>
</html>