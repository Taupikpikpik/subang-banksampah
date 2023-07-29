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
                        <img src="{{ asset('vendor/landing') }}/assets/img/logo.png" alt="" class="img">
                        <h6>DLH<br><small>Subang</small></h6>
                    </div>
                </div>
                <div class="col-auto align-self-center">
                    <a href="{{ url('profile') }}" class="link text-color-theme">
                        <i class="bi bi-person-circle size-22"></i>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">

            <!-- expense  saving -->
            <a href="/withdraw">
                <div class="row">
                    <div class="col">
                        <div class="card shadow-sm product mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="avatar avatar-50 rounded bg-danger text-white">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                    </div>
                                    <div class="col ps-0 align-self-center">
                                        <span class="small text-opac mb-0">Saldo</span>
                                        <p class="mb-1">Rp. {{ number_format($saldo->jumlah_saldo, 2, ',', '.') }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- purchase fatg -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-theme shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-1">Sampah Terjual</p>
                                    <h2>{{ $penjualan }} <small>kg</small></h2>
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
                    @foreach ($kategori as $item)
                        <div class="swiper-slide">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <img src="{{ asset('uploads/images') }}/{{ $item->icon }}" alt="">
                                    </div>
                                </div>
                                <p class="categoryname">{{ $item->nama_kategori }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->

    @include('home.partials.footer')

    <!-- filter menu -->
    <div class="filter">
        <div class="card shadow h-100">
            <div class="card-header">
                <div class="row">
                    <div class="col align-self-center">
                        <h6 class="mb-0">Filter Criteria</h6>
                        <p class="text-opac">2154 products</p>
                    </div>
                    <div class="col-auto px-0">
                        <button class="btn btn-link text-danger filter-close">
                            <i class="bi bi-x size-22"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body overflow-auto">
                <div class="mb-4">
                    <h6>Select Range</h6>
                    <div id="rangeslider" class="mt-4"></div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div class="form-floating">
                            <input type="number" class="form-control" min="0" max="500" value="100"
                                step="1" id="input-select">
                            <label for="input-select">Minimum</label>
                        </div>
                    </div>
                    <div class="col-auto align-self-center"> to </div>
                    <div class="col">
                        <div class="form-floating">
                            <input type="number" class="form-control" min="0" max="500" value="200"
                                step="1" id="input-number">
                            <label for="input-number">Maximum</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <select class="form-control" id="filtertype">
                        <option selected="">Cloths</option>
                        <option>Electronics</option>
                        <option>Furniture</option>
                    </select>
                    <label for="filtertype">Select Shopping Type</label>
                </div>

                <div class="form-group floating-form-group active mb-4">
                    <h6 class="mb-3">Select Facilities</h6>

                    <div class="form-check form-switch mb-2">
                        <input type="checkbox" class="form-check-input" id="men" checked="">
                        <label class="form-check-label" for="men">Men</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input type="checkbox" class="form-check-input" id="woman" checked="">
                        <label class="form-check-label" for="woman">Women</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input type="checkbox" class="form-check-input" id="Sport">
                        <label class="form-check-label" for="Sport">Sport</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input type="checkbox" class="form-check-input" id="homedecor">
                        <label class="form-check-label" for="homedecor">Home Decor</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input type="checkbox" class="form-check-input" id="kidsplay">
                        <label class="form-check-label" for="kidsplay">Kid's Play</label>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Keyword">
                    <label for="input-select">Keyword</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-control" id="discount">
                        <option>10% </option>
                        <option>30%</option>
                        <option>50%</option>
                        <option>80%</option>
                    </select>
                    <label for="discount">Offer Discount</label>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-default w-100 shadow-sm">Search</button>
            </div>
        </div>
    </div>
    <!-- filter menu ends-->

    <!-- add cart modal -->
    @foreach ($kategori as $item)
        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content product border-0 shadow-sm">
                    <div class="modal-body">
                        @foreach ($bank as $data)
                            @if ($data->id_kategori_sampah == $item->id)
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>{{ $data->nama_sampah }} : </td>
                                        <td>Rp.{{ $data->harga_beli }}</td>
                                    </tr>
                                </tbody>
                                <br>
                            @endif
                        @endforeach
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-link text-color-theme"
                            data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- add cart modal ends -->


    @include('home.partials.scripts')

</body>

</html>
