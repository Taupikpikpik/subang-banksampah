<!doctype html>
<html lang="en">

@include('home.partials.head')

<body class="body-scroll" data-page="blank">

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

    <!-- Begin page -->
    <main class="h-100 has-header">

        <!-- Header -->
        <header class="container-fluid header">
            <div class="row h-100">
                <div class="col-auto align-self-center">
                    <a href="{{url('/')}}" class="btn btn-link back-btn text-color-theme">
                        <i class="bi bi-arrow-left size-20"></i>
                    </a>
                </div>
                <div class="col text-center align-self-center">
                    <h5 class="mb-0">Buat Penarikan</h5>
                </div>
                <div class="col-auto align-self-center">
                    <a href="changeaddress.html" class="link text-color-theme">
                        {{-- <i class="bi bi-journal-check size-22"></i> --}}
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <form method="post" action="{{url('withdraw/store')}}">
                                {{ csrf_field() }}
                                <div class="form-floating mb-3">
                                    <input type="hidden" name="id_saldo" value="{{$saldo->id}}">
                                    <input type="number" class="form-control" id="saldo" name="saldo" readonly value="{{ $saldo->jumlah_saldo }}">
                                    <label for="city">Jumlah Saldo</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control {{ $errors->has('jumlah_penarikan') ? 'is-invalid' : '' }}" id="jumlah_penarikan" name="jumlah_penarikan" placeholder="0" value="{{ old('jumlah_penarikan') }}" onkeyup="validateJumlahPenarikan()">
                                    <label for="city">Jumlah Penarikan</label>
                                    @if ($errors->has('jumlah_penarikan'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('jumlah_penarikan') }}
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="d-grid"><button type="submit" class="btn btn-lg btn-default shadow-sm" id="submitButton" disabled>Submit</button></div>
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
    <script>
        function validateJumlahPenarikan() {
            var jumlahPenarikanInput = document.getElementById('jumlah_penarikan');
            var jumlahPenarikan = jumlahPenarikanInput.value;
            var saldo = parseInt("{{ $saldo->jumlah_saldo }}");
            var isValid = jumlahPenarikan <= saldo;

            // Add or remove 'is-valid' and 'is-invalid' classes based on validation result
            jumlahPenarikanInput.classList.remove('is-valid', 'is-invalid');
            jumlahPenarikanInput.classList.add(isValid ? 'is-valid' : 'is-invalid');

            // Enable or disable the submit button based on validation result
            document.getElementById('submitButton').disabled = !isValid;
        }
    </script>
</body>

</html>
