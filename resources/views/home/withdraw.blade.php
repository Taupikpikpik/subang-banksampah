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
            </div>
        </div>
    </div>>
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
                    <h5 class="mb-0">Daftar Penarikan Saldo</h5>
                </div>
                <div class="col-auto align-self-center">
                    @if ($wd)
                        <label>limit</label>
                    @else
                        <a href="{{ url('/withdraw/create') }}" class="link text-color-theme">
                            <i class="bi bi-plus"></i>
                        </a>
                    @endif
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">

            <div class="row mb-2">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card shadow-sm product mb-3">
                        <div class="card-body">
                            <form action="{{ url('withdraw') }}" method="get">
                                @csrf
                                <div class="row align-items-end">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="start_date">Tanggal Mulai</label>
                                            <input type="date" class="form-control" id="start_date"
                                                name="start_date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="end_date">Tanggal Akhir</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @foreach ($withdraw as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm product mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col ps-0 align-self-center">
                                        <p class="mb-0">
                                        <h6 class="text-color-theme">Kode Penarikan : {{ $item->kode }}</h6>
                                        <h6 class="text-color-theme">Tanggal :
                                            {{ \Carbon\Carbon::parse($item->updated_at)->format('d-M-Y') }}</h6>
                                        </p>
                                        <h6 class="text-color-theme">Jumlah Penarikan : {{ $item->jumlah }}</h6>
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-primary">Status : {{ $item->status }}</p>
                                                @if ($item->status == 'Penarikan Ditolak')
                                                    <p class="text-priamry">Alasan Ditolak : {{ $item->ket }}</p>
                                                @elseif ($item->status == 'Menunggu Penukaran Kode')
                                                    <p class="text-priamry">Keterangan : {{ $item->ket }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->



    @include('home.partials.scripts')

</body>

</html>
