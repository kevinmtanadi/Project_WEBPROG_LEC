<section>
    <nav class="navbar navbar-expand">
        <div class="container-fluid mx-3">
            <div class="row w-100">
                <div class="col d-flex align-items-center">
                    <div class="logo me-3">
                        <a href="/">
                            <img width="30px" src="{{ Storage::url('public/images/logo/circial.svg') }}" alt="">
                        </a>
                    </div>
                    <form action="/searchPeople">
                        <input class="form-control" type="text" name="search" id="search" placeholder="{{__('navbar.search')}}">
                    </form>
                </div>
                <div class="col-6 justify-content-center d-flex align-items-center">
                    <a href="/" class="navigation d-flex">
                        <i class="fa-solid fa-house text-color-3 fs-4 mx-auto"></i>
                    </a>
                    <a href="/friend" class="navigation d-flex">
                        <i class="fa-solid fa-user-group text-color-3 fs-4 mx-auto"></i>
                    </a>
                    <button class="navigation d-flex border-0 hover-none focus-none bg-0" data-bs-toggle="modal" data-bs-target="#createpost" onclick="clearPost();">
                        <i class="fa-solid fa-square-plus text-color-3 fs-3 mx-auto"></i>
                    </button>
                </div>
                <div class="col d-flex flex-row-reverse align-items-center">
                    <button class="profile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="profile" src="{{Storage::url('public/images/profile/'.Auth::user()->profile_pic)}}" alt="Profile Pic">
                    </button>
                    <div class="dropdown">
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a class="dropdown-item" href="/profile/{{Auth::user()->id}}">{{__('navbar.profile')}}</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="/logout">{{__('navbar.logout')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="createpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="text-center" method="POST" enctype="multipart/form-data" action="/createpost">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Create new post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <input type="file" class="content" name="content" id="content">
                            <label class="btn btn-3" for="content">Select an image to post!</label>
                    </div>
                    <div class="output" style="display: none">
                    </div>
                    <div class="caption py-3 px-3" style="display: none">
                        <h5>Insert a Caption</h5>
                        <textarea class="form-control px-2" name="caption" id="caption" cols="30" rows="10"></textarea>
                    </div>

                    <div class="modal-footer post-footer">

                    </div>
                </form>

            </div>
        </div>
    </div>
</section>