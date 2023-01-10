<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Log In</title>
</head>
<body class="d-flex flex-column min-vh-100 log-in">

    <div class="center">
        <div class="container">
            <div class="row">
                <div class="col-1 col-md-3 col-xl-4"></div>
                <div class="col-10 col-md-6 col-xl-4">
                    <div class="mx-auto py-3 box bg-0">
                        @if ($errors->any())
                            <strong>{{$errors->first()}}</strong>
                        @endif
                        <form class="my-3 px-3" action="/login" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="email_login" name="email_login" placeholder="Email address">
                                <label for="email_login">Email address</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" id="password_login" name="password_login" placeholder="Password">
                                <label for="password_login">Password</label>
                            </div>
                            <div class="my-2 align-middle">
                                <input class="form-check-input me-1" type="checkbox" name="remember" id="remember"><label class="" for="remember"> Remember Me</label>
                            </div>
                            <div class="my-2">
                                <input class="form-control btn btn-3 py-2" type="submit" value="Log In">
                            </div>
                        </form>
                        <hr>
                        <div class="px-3 text-center">
                            Don't have an account?
                            <button type="button" class="border-0 hover-none text-color-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                                Register
                            </button>
                        </div>
                        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md modal-dialog-centered">
                                <div class="modal-content">
                                    <form enctype="multipart/form-data" action="/register" method="POST" >
                                        @csrf
                                        <div class="modal-header border-0">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create new account</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-floating mb-2">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Full name">
                                                <label for="name">Full name</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                                                <label for="password_confirmation">Confirm Password</label>
                                            </div>
                                            <div class="form-floating mb-1">
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                                <label for="phone">Phone number</label>
                                            </div>
                                            <div class="mb-2 justify-content-center position-relative">
                                                <span class="text-start mb-1 ml-1">Gender</span>
                                                <div class="d-flex text-center">
                                                    <div class="py-2 px-0 gender mx-1">
                                                        <label class="p-auto" for="male">Male</label>
                                                        <input class="form-check-input clamp-right" type="radio" name="gender" id="male">
                                                    </div>
                                                    <div class="py-2 px-0 gender mx-1">
                                                        <label for="female">Female</label>
                                                        <input class="form-check-input clamp-right" type="radio" name="gender" id="female">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="mb-2">
                                                <span class=" align-self-start mb-1 ml-1">Date of Birth</span>
                                                <input class="form-control py-2" type="date" name="dob" id="dob" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="form-control btn btn-3">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1 col-md-3 col-xl-4"></div>
            </div>
        </div>
    </div>

</body>

<footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</footer>
</html>