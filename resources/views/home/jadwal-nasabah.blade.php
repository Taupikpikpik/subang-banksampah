<!doctype html>
<html lang="en">

@include('home.partials.head')

@php

    use App\Models\PenjualanSampahDetail;

@endphp

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
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page -->
    <main class="h-100 has-header ">

        <!-- Header -->
        <header class="container-fluid header">
            <div class="row h-100">
                <div class="col-auto align-self-center">
                    <a href="{{ url('/') }}" class="btn btn-link back-btn text-color-theme">
                        <i class="bi bi-arrow-left size-20"></i>
                    </a>
                </div>
                <div class="col text-center align-self-center">
                    <h5 class="mb-0">Jadwal Pengambilan</h5>
                </div>
                <div class="col-auto align-self-center">
                    <a href="{{ url('/sell/create') }}" class="link text-color-theme">
                        {{-- <i class="bi bi-plus"></i> --}}
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->

        <div class="main-container container">
            <div class="row mb-2">
                <div class="card shadow-sm product mb-3">
                    <div class="card-body">
                        <form action="/jadwal/update/{{ $id_penjualan }}" method="POST">
                            <input type="text" id="now" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                hidden>
                            @csrf
                            <center>
                                <label for="nasabah">Nama : {{ $nasabah->name }}</label>
                                <input type="text" value="{{ $nasabah->id }}" hidden>
                            </center>
                            <div class="row p-3">
                                <div class="col-lg-3">
                                    <label for="hari" class="form-label">Tanggal</label>
                                    <input onchange="cek()" id="tanggal" type="date" class="form-control"
                                        name="hari">
                                    <span style="color:red;display:none;" id="peringatan">Tanggal Minimal Lebih Dari
                                        Hari Ini.</span>
                                </div>
                                <div class="col-lg-3">
                                    <label for="jam" class="form-label">Jam</label>
                                    <input type="time" class="form-control" name="jam"
                                        value="{{ $jadwals ? $jadwals->jam_start : '' }}">
                                </div>
                            </div>
                            <br>
                            <center>
                                <button id="kirim" class="btn btn-primary" hidden>Update</button>
                            </center>
                            <a onclick="send()" href="#" class="btn btn-primary">Update</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->



    @include('home.partials.scripts')
    <script>
        function cek() {
            var tgl = $("#tanggal").val();
            var now = $("#now").val();
            if (tgl > now) {
                document.getElementById("peringatan").style.display = "none"
            } else {
                document.getElementById("peringatan").style.display = "block"
            }
        }

        function send() {
            var tgl = $("#tanggal").val();
            var now = $("#now").val();
            if (tgl > now) {
                document.getElementById("kirim").click()
            } else {
                document.getElementById("peringatan").style.display = "block"
            }
        }
    </script>

</body>

</html>
