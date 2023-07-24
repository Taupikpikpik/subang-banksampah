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
                    <h5 class="mb-0">Buat Penjualan</h5>
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
            <form method="post" action="{{url('sell/store')}}" class="row">
                {{ csrf_field() }}
                <div class="col-12 col-md-12 col-lg-12 mx-auto mb-3">
                    <button class="btn btn-primary text-white px-3" type="button" id="add-form">Tambah Form</button>
                    <button type="submit" class="btn btn-success px-3 ml-2 text-white shadow-sm">Submit</button>
                </div>
                <div class="col-12 col-md-12 col-lg-12 row" id="all-form">
                    <div class="col-12 col-md-6 col-lg-4 parent-1">
                        <div class="card card-light shadow-sm mb-4">
                            <div class="card-body">
                                <div class="form-floating mb-3">
                                    <select class="form-select" data-id="1"  name="id_sampah[]" onchange="getSampahDetail(1)">
                                        <option selected disabled>Pilih Sampah</option>
                                        @foreach($sampah as $item)
                                            <option value="{{$item->id}}">{{$item->nama_sampah}}</option>
                                        @endforeach
                                    </select>
                                    <label for="select">Sampah</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" data-id="1"  name="kuantitas[]" placeholder="Kuantitas">
                                    <label for="city">Kuantitas</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" data-id="1"  name="total[]" readonly value="">
                                    <label for="city">Harga Jual</label>
                                </div>
                                <button class="btn btn-danger text-white px-3 mb-3 delete-form" data-id="1" type="button">Hapus Form</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->


    @include('home.partials.scripts')
    <script>
        function getSampahDetail(num) {
            var sampahId = $(`[data-id="${num}"][name="id_sampah[]"]`).val()

            // Send AJAX request to fetch sampah details
            $.ajax({
                url: '/get-harga-beli/' + sampahId,
                type: 'GET',
                success: function(response) {
                    var hargaBeli = response.harga_beli;
                    var kuantitas = $(`[data-id="${num}"][name="kuantitas[]"]`).val();
                    var total = hargaBeli * kuantitas;

                    $(`[data-id="${num}"][name="total[]"]`).val(total)
                }
            });
        }
        let id = 1
        $(document).on('click','#add-form',function(){
            id += 1
            $("#all-form").append(`
                <div class="col-12 col-md-6 col-lg-4 parent-${id}">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                <select class="form-select" data-id="${id}" name="id_sampah[]" onchange="getSampahDetail(${id})">
                                    <option selected disabled>Pilih Sampah</option>
                                    @foreach($sampah as $item)
                                        <option value="{{$item->id}}">{{$item->nama_sampah}}</option>
                                    @endforeach
                                </select>
                                <label for="select">Sampah</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" data-id="${id}" name="kuantitas[]" placeholder="Kuantitas">
                                <label for="city">Kuantitas</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" data-id="${id}" name="total[]" readonly value="">
                                <label for="city">Harga Jual</label>
                            </div>
                            <button class="btn btn-danger text-white px-3 mb-3 delete-form" data-id="${id}" type="button">Hapus Form</button>
                        </div>
                    </div>
                </div>
            `)
        })

        $(document).on('click','.delete-form',function(){
            data_id = $(this).data('id')
            $(".parent-"+data_id).remove()
        })
        // Add event listener for keyup event on kuantitas input field
        $(document).on('keyup',`[name="kuantitas[]"]`,function(){
            getSampahDetail($(this).data('id'))
        });
    </script>
</body>

</html>