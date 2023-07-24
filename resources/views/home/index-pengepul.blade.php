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
                                    <p class="mb-1">Total Pembelian Sampah</p>
                                    <h2>{{$pembelian}} <small> kg</small></h2>
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
            <div class="row mb-3">
                <div class="col">
                    <h5 class="mb-0">Daftar Bank Sampah</h5>
                    <button type="button" class="btn btn-info text-white mt-2 btn-keranjang">Keranjang</button>
                </div>
            </div>
            <div class="row">
                @foreach($sampah as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm product mb-4">
                        <div class="card-body">
                            <figure class="text-center">
                                <img src="{{asset('uploads/images')}}/{{$item->kategori->icon}}" alt="" style="width:150px;">
                            </figure>
                            <p class="mb-1">
                                <small class="text-opac">{{$item->kategori->nama_kategori}}</small>
                                <small class="float-end"><span class="text-opac">Stok : </span>{{$item->stok}}</small>
                            </p>
                            <a href="#" class="text-normal">
                                <h6 class="text-color-theme">{{$item->nama_sampah}}</h6>
                            </a>
                            <div class="row">
                                <div class="col">
                                    <p class="mb-0" style="font-size:14px !important;">Rp. {{number_format($item->harga_jual,2,',',',')}}<br><small class="text-opac">per 1 kg</small></p>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm avatar before-beli avatar-30 p-0 rounded-circle shadow btn-gradient" data-bs-toggle="modal" data-bs-target="#addproductcart{{$item->id}}">
                                        <i class="bi bi-plus size-22"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add cart modal -->
                <div class="modal fade" id="addproductcart{{$item->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        
                            <div class="modal-content product border-0 shadow-sm">
                                <figure class="text-center mb-0 px-5 py-3">
                                    <img src="{{asset('uploads/images')}}/{{$item->kategori->icon}}" alt="" class="mw-100">
                                </figure>
                                <div class="modal-body">
                                    <p class="mb-1">
                                        <small class="text-opac">{{$item->kategori->nama_kategori}}</small>
                                        <small class="float-end"><span class="text-opac">Stok : </span>{{$item->stok}}</small>
                                    </p>
                                    <a href="#" class="text-normal">
                                        <h6 class="text-color-theme nama_sampah">{{$item->nama_sampah}}</h6>
                                    </a>
                                    <div class="row">
                                        <div class="col">
                                            <p class="mb-0" style="font-size:14px !important;">Rp. {{number_format($item->harga_jual,2,',',',')}}<br><small class="text-opac">per 1 kg</small></p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- button counter incrementer -->
                                            <div class="counter-number">
                                                <input type="hidden" name="id_sampah" value="{{$item->id}}">
                                                <button class="btn btn-sm avatar avatar-30 p-0 rounded-circle decrease-btn{{$item->id}}" type="button">
                                                    <i class="bi bi-dash size-22"></i>
                                                </button>
                                                <span class="counter{{$item->id}}">1</span>
                                                <input type="hidden" name="kuantitas" value="" id="kuantitas{{$item->id}}">
                                                <button class="btn btn-sm avatar avatar-30 p-0 rounded-circle increase-btn{{$item->id}}" type="button">
                                                    <i class="bi bi-plus size-22"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button class="btn btn-link text-color-theme do-beli" data-id_sampah="{{ $item->id }}" data-nama_sampah="{{ $item->nama_sampah }}" type="button" >BELI</button>
                                </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var counterElement = document.querySelector(".counter{{$item->id}}");
                        var decreaseBtn = document.querySelector(".decrease-btn{{$item->id}}");
                        var increaseBtn = document.querySelector(".increase-btn{{$item->id}}");
                        var kuantitasInput = document.querySelector("#kuantitas{{$item->id}}");
                        var stokValue = {{$item->stok}}; // Get the maximum value from the PHP variable

                        // Initial value
                        var counterValue = 1;
                        counterElement.textContent = counterValue;
                        kuantitasInput.value = counterValue;

                        decreaseBtn.addEventListener("click", function(event) {
                            event.preventDefault();
                            if (counterValue > 1) {
                                counterValue--;
                                counterElement.textContent = counterValue;
                                kuantitasInput.value = counterValue;
                            }
                        });

                        increaseBtn.addEventListener("click", function(event) {
                            event.preventDefault();
                            if (counterValue < stokValue) { // Check if the counter value is less than the maximum value
                                counterValue++;
                                counterElement.textContent = counterValue;
                                kuantitasInput.value = counterValue;
                            }
                        });
                    });
                </script>
                <!-- add cart modal ends -->
                @endforeach
                @foreach($kategori as $item)
    <div class="modal fade" id="detail{{$item->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content product border-0 shadow-sm">
                <div class="modal-body">
                    @foreach($sampah as $data)
                    @if($data->id_kategori_sampah == $item->id)
                    <tbody>
                        <tr>
                            <td>-</td>
                            <td>{{$data->nama_sampah}} : </td>
                            <td>Rp.{{$data->harga_jual}}</td>
                        </tr>
                    </tbody>
                    <br>
                    @endif
                    @endforeach
                </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-link text-color-theme" data-bs-dismiss="modal">OK</button>
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

    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="modalCartLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Daftar Sampah</h5>
            <button type="button" class="btn btn-secondary btn-close bg-light"></button>
          </div>
          <div class="modal-body">
            <form action="{{url('pengepul/beli')}}" method="post" class="form-keranjang">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success text-white" >Beli</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    @include('home.partials.footer-pengepul')


    @include('home.partials.scripts')
    <script>
        
        $('.do-beli').click(function(){
            let id_sampah = $(this).data('id_sampah')
            let kuantitas = $("#kuantitas"+id_sampah).val()
            let nama_sampah = $(this).data('nama_sampah')

            $('.form-keranjang').prepend(`
                <div class="form-group d-flex mb-2">
                    <div class="mb-2 mx-2">
                        <label>Nama</label>
                        <input class='form-control' type="text" readonly name="nama_sampah[]" value="${nama_sampah}">
                    </div>
                    <div class="mb-2 mx-2">
                        <input class='form-control' type="hidden" readonly name="id_sampah[]" value="${id_sampah}">
                    </div>
                    <div class="mb-2 mx-2">
                        <label>Kuantitas</label>
                        <input class='form-control' type="text" readonly name="kuantitas[]" value="${kuantitas}">
                    </div>
                    <div class="mb-2 mx-2">
                        <label>&nbsp;</label><br>
                        <button class="btn btn-danger w-100 text-white btn-hapus" type='button'>Hapus</button>
                    </div>
                </div>
            `)
            $('.modal').modal('hide')
            $('#modalCart').modal('show')
        })

        $('.before-beli').click(function(){
            id_sampah = $(this).data('id_sampah')
            nama_sampah = $(this).data('nama_sampah')

            $('.do-beli').data('id_sampah',id_sampah)
            $('.do-beli').data('nama_sampah',nama_sampah)
            $('.do-beli').data('kuantitas',$("#kuantitas"+id_sampah).val())
        })

        $('.btn-keranjang').click(function(){
            $('#modalCart').modal('show')
        })

        $('.btn-close').click(function(){
            $('#modalCart').modal('hide')
        })

        $(document).on('click','.btn-hapus',function(){
            $(this).parent().parent().remove()
        })

    </script>

</body>

</html>