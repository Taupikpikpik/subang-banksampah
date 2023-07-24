<!doctype html>
<html lang="en">

@include('home.partials.head')

<body class="body-scroll" data-page="home">

    {{-- @include('home.partials.header') --}}

    <!-- Begin page -->
    <main class="h-100 has-header has-footer">

        <!-- Header -->
        <header class="container-fluid header">
            <div class="row">
                <div class="col-auto align-self-center">
                    {{-- <button type="button" class="btn btn-link menu-btn text-color-theme">
                        <i class="bi bi-list size-24"></i>
                    </button> --}}
                </div>
                <div class="col text-center">
                    <div class="logo-small">
                        <img src="{{asset('vendor/landing')}}/assets/img/logo.png" alt="" class="img">
                        <h6>DLH<br><small>Subang</small></h6>
                    </div>
                </div>
                <div class="col-auto align-self-center">
                    <a href="{{url('profile')}}" class="link text-color-theme">
                        <i class="bi bi-person-circle size-22"></i>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">

            <!-- purchase fatg -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-theme shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-1">Total Penjualan Yang Di Pick-Up</p>
                                    <h2>{{$jadwal}} <small> transaksi</small></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- categories -->
            <div class="swiper-container categoriesswiper mb-3">
                <h3>Kategori Sampah</h3>
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach($kategori as $item)
                    <div class="swiper-slide">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#detail{{$item->id}}">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <img src="{{asset('uploads/images')}}/{{$item->icon}}" alt="">
                                </div>
                            </div>
                            <p class="categoryname">{{$item->nama_kategori}}</p>
                            </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->
    @foreach($kategori as $item)
    <div class="modal fade" id="detail{{$item->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content product border-0 shadow-sm">
                <div class="modal-body table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Sampah</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    @foreach($bank as $data)
                    @if($data->id_kategori_sampah == $item->id)
                    <tbody>
                        <tr>
                            <td>{{$data->nama_sampah}}</td>
                            <td>Rp. {{$data->harga_beli}}</td>
                            <td>Rp. {{$data->harga_jual}}</td>
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
                </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-link text-color-theme" data-bs-dismiss="modal">OK</button>
                    </div>
            </div>
        </div>
    </div>
    @endforeach

    @include('home.partials.footer-petugas')


    @include('home.partials.scripts')

</body>

</html>