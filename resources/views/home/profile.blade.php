<!doctype html>
<html lang="en">

@include('home.partials.head')

<body class="body-scroll" data-page="">

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
                <p>Let's Create Difference<br><strong>Please wait...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page -->
    <main class="h-100 has-header">

        <!-- Header -->
        <header class="container-fluid header">
            <div class="row h-100">
                <div class="col-auto align-self-center">
                    <a href="{{ url('/') }}" class="btn btn-link back-btn text-color-theme">
                        <i class="bi bi-arrow-left size-20"></i>
                    </a>
                </div>
                <div class="col text-center align-self-center">
                    <h5 class="mb-0">Profil</h5>
                </div>
                <div class="col-auto align-self-center">
                    <a href="settings.html" class="link text-color-theme">
                        {{-- <i class="bi bi-gear size-22"></i> --}}
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">
            <!-- profile picture -->

            <!-- wallet info -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-theme shadow-sm mb-4">
                        <div class="card-body">
                            <div class="card card-light mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            {{-- <figure class="avatar avatar-80 rounded mx-auto">
                                                <img src="{{asset('vendor/landing')}}/assets/img/user1.jpg" alt="">
                                            </figure> --}}
                                        </div>
                                        <div class="col align-self-center">
                                            <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <form method="post" action="{{ url('profile/update/' . Auth::user()->id) }}">
                                {{ csrf_field() }}
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" readonly
                                        value="{{ Auth::user()->email }}">
                                    <label for="city">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label for="city">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ Auth::user()->name }}">
                                    <label for="city">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ Auth::user()->address }}">
                                    <label for="city">Alamat</label>
                                </div>
                                <div class="d-grid"><button type="submit" class="btn btn-lg btn-default shadow-sm"
                                        id="submitButton">Update Profile</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->


    @include('home.partials.scripts')

</body>

</html>
