<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layout.navbar')

    <div class="container my-3 d-flex">
        @foreach ($peoples as $people)
            <div class="card mx-auto" style="min-width: 600px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2 d-flex justify-content-center">
                            <img class="people-profile" src="{{Storage::url('public/images/profile/'.$people->profile_pic)}}" alt="test">
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <span class="fw-semibold">{{ $people->name }}</span>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <div class="text-end my-auto">
                                <a class="btn btn-3" href="/addFriend/{{$people->id}}">Add Friend</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
    @include('layout.footer')

</body>
</html>