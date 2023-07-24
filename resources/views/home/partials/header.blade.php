<!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap mx-auto">
                    <div class="loader-cube1 loader-cube"></div>
                    <div class="loader-cube2 loader-cube"></div>
                    <div class="loader-cube4 loader-cube"></div>
                    <div class="loader-cube3 loader-cube"></div>
                </div>
                {{-- <p>Let's Create Difference<br><strong>Please wait...</strong></p> --}}
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    <div class="sidebar-wrap  sidebar-overlay">
        <!-- Add pushcontent or fullmenu instead overlay -->
        <div class="closemenu text-opac">Close Menu</div>
        <div class="sidebar">
            <div class="row mt-4 mb-3">
                <div class="col-auto">
                    <figure class="avatar avatar-60 rounded mx-auto my-1">
                        <img src="{{asset('vendor/landing')}}/assets/img/user2.jpg" alt="">
                    </figure>
                </div>
                <div class="col align-self-center ps-0">
                    <h6 class="mb-0">{{Auth::user()->name}}</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="stats.html">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Beranda</div>
                                <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="chat.html" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-chat-text"></i></div>
                                <div class="col">Messages</div>
                                <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout.user')}}" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                                <div class="col">Keluar</div>
                                <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar main menu ends -->