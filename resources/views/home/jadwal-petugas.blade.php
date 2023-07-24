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
    </div>
    <!-- loader section ends -->

    <!-- Begin page -->
    <main class="h-100 has-header ">

        <!-- Header -->
        <header class="container-fluid header">
            <div class="row h-100">
                <div class="col-auto align-self-center">
                    <a href="{{url('/')}}" class="btn btn-link back-btn text-color-theme">
                        <i class="bi bi-arrow-left size-20"></i>
                    </a>
                </div>
                <div class="col text-center align-self-center">
                    <h5 class="mb-0">Daftar Jadwal Pengambilan</h5>
                </div>
                <div class="col-auto align-self-center">
                    <a href="{{url('/sell/create')}}" class="link text-color-theme">
                        {{-- <i class="bi bi-plus"></i> --}}
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">

            <div class="row mb-2">
                @foreach($jadwal as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm product mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col ps-0 align-self-center">
                                    <p class="mb-0">
                                        <small class="text-opac">ID Penjualan : {{$item->id}}</small>
                                    </p>
                                    <h6 class="text-color-theme">Nasabah : {{$item->penjualan->nasabah->name}}</h6>
                                    <h6 class="text-color-theme">Alamat : {{$item->penjualan->nasabah->address}}</h6>
                                    <h6 class="text-color-theme">Tanggal : {{$item->tanggal}}</h6>
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-primary">Status : {{$item->status}}</p>
                                        </div>
                                    </div>
                                    @if($item->status != 'Sampah Telah Diambil')
                                    <div class="row">
                                        <div class="d-grid">
                                            <button class="btn btn-sm btn-warning shadow-sm mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#ubah{{$item->id}}">Ubah Data</button>
                                            <button class="btn btn-sm btn-default shadow-sm mb-2" data-bs-toggle="modal" data-bs-target="#approve{{$item->id}}">Selesaikan Transaksi</button>
                                        </div>
                                        <!-- add cart modal -->
                                        <div class="modal fade" id="approve{{$item->id}}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content product border-0 shadow-sm">
                                                    <div class="modal-body">
                                                        <h3>Apakah anda ingin menyelesaikan transaksi?</h3>
                                                    </div>
                                                    <form action="{{url('petugas/jadwal')}}/{{$item->id}}" method="get">
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="submit" class="btn btn-link text-color-theme" data-bs-dismiss="modal">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="ubah{{$item->id}}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content product border-0 shadow-sm">
                                                    <div class="modal-body">
                                                        <h3>Ubah Data</h3>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label>Sampah</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{url('petugas/jadwal')}}/{{$item->id}}" method="get">
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="submit" class="btn btn-link text-color-theme" data-bs-dismiss="modal">Ya</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- add cart modal ends -->
                                    </div>
                                    @endif
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