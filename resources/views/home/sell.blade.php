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
                    <a href="{{ url('/') }}" class="btn btn-link back-btn text-color-theme">
                        <i class="bi bi-arrow-left size-20"></i>
                    </a>
                </div>
                <div class="col text-center align-self-center">
                    <h5 class="mb-0">Daftar Penjualan</h5>
                </div>
                <div class="col-auto align-self-center">
                    @if ($penjualans)
                        <label>limit</label>
                    @else
                        <a href="{{ url('/sell/create') }}" class="link text-color-theme">
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
                            <form action="{{ url('sell') }}" method="get">
                                <div class="row mb-2">
                                    <div class="form-group col-lg-4 col-6">
                                        <label class="form-label" for="date">Search</label>
                                        <input type="date" id="date" name="date" class="form-control" />
                                    </div>
                                    <div class="form-group col-lg-6 col-6 row align-items-end">
                                        <button type="submit" class="btn btn-primary btn-sm w-25">
                                            <i class="bi bi-search text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @foreach ($penjualan as $key => $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm product mb-3">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col ps-0 align-self-center">
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-primary">
                                                    Penjualan {{ $loop->iteration }} <br>
                                                    <br>
                                                    Status : {{ $item->status_penjualan }}
                                                </p>
                                                <h6 class="text-color-theme">Tanggal : {{ $item->updated_at }}</h6>
                                                <button type="button" onclick="detailData(<?= $item->id ?>)"
                                                    class="btn btn-info text-white">Detail</button>
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

    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
                    <button type="button" class="btn btn-secondary btn-close bg-light"></button>
                </div>
                <div class="modal-body modal-detail">
                </div>
            </div>
        </div>
    </div>

    @include('home.partials.scripts')
    <script>
        function detailData(num) {
            $.ajax({
                url: '/get-detail-penjualan/' + num,
                type: 'GET',
                success: function(res) {
                    let dataSampah = `
                            <tr>
                                <td>No</td>
                                <td>Nama Sampah</td>
                                <td>Kuantitas</td>
                                <td>Total</td>
                            </tr>`
                    let total = 0

                    $.each(res.data, (i, val) => {
                        dataSampah += `
                            <tr>
                                <td>${i+1}</td>
                                <td>${val.sampah.nama_sampah}</td>
                                <td>${val.kuantitas}</td>
                                <td>${val.total}</td>
                            </tr>
                        `
                        total += parseInt(val.total)
                    })
                    dataSampah += `
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>${total}</td>
                            </tr>
                        `

                    $('.modal-detail').html(`
                        <table class='table'>
                            ${dataSampah}
                        </table>
                    `)
                    $('#modalDetail').modal('show')
                }
            });
        }

        $('.btn-close').click(function() {
            $('#modalDetail').modal('hide')
        })
    </script>

</body>

</html>
