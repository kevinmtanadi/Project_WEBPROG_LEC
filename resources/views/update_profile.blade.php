<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
    <title>Home</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('layout.navbar')

    <div class="container my-4 box">
        <form name="updateProfile" class="my-2" action="/executeUpdateProfile" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-borderless align-middle">
                <tbody>
                    <tr>
                        <td class="text-end"><img class="profile" src="{{Storage::url('public/images/profile/'.Auth::user()->profile_pic)}}" alt=""></td>
                        <td><button class="border-0 hover-none focus-none text-color-3 fw-semibold" type="button" data-bs-toggle="modal" data-bs-target="#profilePicModal" onclick="resetProfilePicModal();">{{__('unlogged.input.change_pic')}}</button></td>
                    </tr>
                    <tr>
                        <td class="text-end"><label class="fw-semibold" for="name">{{__('unlogged.input.name')}}</label></td>
                        <td><input class="form-control w-50" type="text" name="name" id="name" value="{{Auth::user()->name}}"></td>
                    </tr>
                    <tr>
                        <td class="text-end"><label class="fw-semibold" for="email">{{__('unlogged.input.email')}}</label></td>
                        <td><input class="form-control w-50" type="email" name="email" id="email" value="{{Auth::user()->email}}"></td>
                    </tr>
                    <tr>
                        <td class="text-end"><label class="fw-semibold" for="phone">{{__('unlogged.input.phone')}}</label></td>
                        <td><input class="form-control w-50" type="text" name="phone" id="phone" value="{{Auth::user()->phone}}"></td>
                    </tr>
                    <tr>
                        <td class="text-end"><label class="fw-semibold" for="gender">{{__('unlogged.input.gender')}}</label></td>
                        <td><select class="form-control w-50" name="gender" id="gender">
                            <option value="male" {{ strcasecmp(Auth::user()->gender, "male") == 0 ? 'selected' : ''}}>{{__('unlogged.input.gender_choices.male')}}</option>
                            <option value="female" {{ strcasecmp(Auth::user()->gender, "female") == 0 ? 'selected' : '' }}>{{__('unlogged.input.gender_choices.female')}}</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class="text-end"><label class="fw-semibold" for="dob">{{__('unlogged.input.dob')}}</label></td>
                        <td><input class="form-control w-50" type="text" name="dob" id="dob" value="{{Auth::user()->dob}}"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="btn btn-3" type="submit" value="{{__('unlogged.input.save')}}"></td>
                    </tr>
                </tbody>
            </table>
        </form>

        <div class="modal fade" id="profilePicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="/changeprofilepic" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center mb-4">
                                <img class="profile-4" src="{{Storage::url('public/images/profile/'.Auth::user()->profile_pic)}}" alt="">
                            </div>
                            <hr class="my-1">
                            <div class="take-input">
                                <input type="file" class="profilePic" name="profilePic" id="profilePic">
                                <label class="w-100 btn fw-semibold fs-5 text-color-3" for="profilePic">Upload picture</label>
                            </div>
                            <div class="save" style="display: none">
                                <input class="w-100 btn fw-semibold fs-5 text-color-3" type="submit" value="Save">
                            </div>
                            <hr class="my-1">
                            <div>
                                <a class="w-100 btn fw-semibold fs-5 text-danger" href="/deletePicture">Delete picture</a>
                            </div>
                            <hr class="my-1">
                            <div>
                                <button type="button" class="w-100 btn btn-0 fs-5 fw-light" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>