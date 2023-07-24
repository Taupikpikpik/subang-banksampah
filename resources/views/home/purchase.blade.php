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
                    <h5 class="mb-0">Daftar Pembelian</h5>
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
                @foreach($pembelian as $key => $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm product mb-3 p-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col ps-0 align-self-center">
                                    <h6 class="text-primary">Pembelian : {{$key+1}}</h6>
                                    <h6 class="text-color-theme">Kode : {{$item->kode_pembelian}}</h6>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="text-primary">Status : {{$item->status_pembelian}}</p>
                                            @if($item->status_pembelian == 'Pembelian Ditolak')
                                            <p class="text-primary">Alasan Ditolak : {{$item->ket}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="button" onclick="detailData(<?= $item->id ?>)" class="btn btn-info text-white">Detail</button>
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


    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Pembelian</h5>
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
                url: '/get-detail-pembelian/' + num,
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

                    $.each(res.data, (i,val) => {
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

        $('.btn-close').click(function(){
            $('#modalDetail').modal('hide')
        })
    </script>

</body>

</html>