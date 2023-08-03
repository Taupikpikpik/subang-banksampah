<!doctype html>
<html lang="en" class="h-100">

@include('home.partials.head')

<body class="body-scroll d-flex flex-column h-100 dark-bg bg1" data-page="signin">

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
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page content -->
    <main class="container-fluid h-100 main-container">
        <div class="overlay-image text-end">
            <img src="{{ asset('vendor/landing') }}/assets/img/orange-slice.png" class="orange-slice" alt="">
        </div>

        <div class="row h-100">
            <div class="col-12 text-center">
                <div class="logo-small">
                    <img src="{{ asset('vendor/landing') }}/assets/img/logo.png" alt="" class="img">
                    <h6>DLH<br><small> Subang</small></h6>
                </div>
            </div>
            <div class="col-12 mx-auto text-center">
                <div class="row h-100">
                    <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 mx-auto align-self-center">
                        <h2 class="text-center mb-4">Lupa Password</h2>
                        <div class="card card-light shadow-sm mb-4">
                            <div class="card-body">
                                <form class="was-validated" method="post" action="/lupa-password">
                                    {{ csrf_field() }}
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="emailaddress"
                                            placeholder="name@example.com" name="email" required>
                                        <label for="emailaddress">Email</label>
                                        <button type="button" class="btn btn-link tooltip-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Email is valid">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </div>
                                    <div class="d-grid"><button type="submit"
                                            class="btn btn-lg btn-default shadow-sm">Send</button></div>
                                    <div class="d-grid">
                                        <a href="/pengepul">Login</a>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            {{-- <div class="col-12 text-center align-self-end py-2">
                <div class="row">
                    <div class="col text-center">
                        Belum memiliki akun? <a href="{{route('register.page')}}" class="btn btn-link px-0 ms-2">Register <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>



    @include('home.partials.scripts')

</body>

</html>
