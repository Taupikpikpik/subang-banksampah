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
                    <a href="{{ url('/') }}" class="btn btn-link back-btn text-color-theme">
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
            <form method="post" action="{{ url('sell/store') }}" class="row">
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
                                    <select class="form-select" data-id="1" name="kategori[]" id="kategori[]"
                                        onchange="changeKategori(this)">
                                        <option selected disabled>Kategori</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->kategori->id }}">{{ $k->kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                        <label for="kategori">Kategori</label>

                                    </select>
                                </div>
                                <div class="form-floating mb-3" id="selectsampah-1">
                                    {{--
                                        <select class="form-select" data-id="1" name="id_sampah[]" id="id-sampah-1"
                                            onchange="getSampahDetail(1)">
                                        <option selected disabled>Pilih Sampah</option>
                                        @foreach ($sampah as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_sampah }}</option>
                                        @endforeach
                                    </select>
                                    <label for="kategori-1">kategori</label>
                                        --}}
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" data-id="1" name="kuantitas[]"
                                        name="kuantitas-1" placeholder="Kuantitas" onkeyup="gettotal(this)">
                                    <label for="city">Kuantitas</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" data-id="1" name="total[]"
                                        id="total-1" readonly value="">
                                    <label for="city">Harga Jual</label>
                                </div>
                                <button class="btn btn-danger text-white px-3 mb-3 delete-form" data-id="1"
                                    type="button">Hapus Form</button>
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
        function changeKategori(data) {
            var idkategori = data.value;
            var dataid = $(data).attr('data-id');

            $.ajax({
                url: '/get-data-sampah/' + idkategori,
                type: 'GET',
                success: function(response) {
                    console.log(id);


                    // Create a new select element
                    var selectElement = $('<select>', {
                        class: 'form-select',
                        'data-id': dataid,
                        name: 'sampah[]',
                        id: 'sampah-' + dataid,
                        onchange: 'getSampahDetail(this)'
                    }).append($('<option>', {
                        selected: true,
                        disabled: true,
                        text: 'Pilih Sampah'
                    }));

                    // Append options to the select element
                    $.each(response, function(i, level) {
                        selectElement.append($('<option>', {
                            value: level['id'],
                            text: level['nama_sampah']
                        }));
                    });

                    // Clear the previous content and append the select element to the container
                    $("#selectsampah-" + dataid).empty().append(selectElement);

                    // Add the label after the select element
                    $("#selectsampah-" + dataid).append('<label for="select">Sampah</label>');
                }
            });
        }


        function getSampahDetail(num) {

            var sampahId = num.value;

            // Send AJAX request to fetch sampah details
            $.ajax({
                url: '/get-harga-beli/' + sampahId,
                type: 'GET',
                success: function(response) {

                    var hargaBeli = response.harga_beli;
                    var kuantitas = $(`#kuantitas-` + sampahId).val();
                    var total = hargaBeli * kuantitas;

                    console.log(hargaBeli)
                    console.log(kuantitas)

                    $(`[data-id="${num}"][name="total[]"]`).val(total)
                }
            });
        }

        let id = 1
        $(document).on('click', '#add-form', function() {
            id += 1
            $("#all-form").append(`
                <div class="col-12 col-md-6 col-lg-4 parent-${id}">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <div class="form-floating mb-3">
                                    <select class="form-select" data-id="${id}" name="kategori[]" id="kategori-${id}"
                                        onchange="changeKategori(this)">
                                        <option selected disabled>Kategori</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->kategori->id }}">{{ $k->kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="select">Kategori</label>
                                </div>
                                <div class="form-floating mb-3" id="selectsampah-${id}">

                                <label for="select">Sampah</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" data-id="${id}" name="kuantitas[]"  id="kuantitas-${id}" placeholder="Kuantitas"  onkeyup="gettotal(this)">
                                <label for="city">Kuantitas</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" data-id="${id}" name="total[]" readonly value=""  id="total-${id}" >
                                <label for="city">Harga Jual</label>
                            </div>
                            <button class="btn btn-danger text-white px-3 mb-3 delete-form" data-id="${id}" type="button">Hapus Form</button>
                        </div>
                    </div>
                </div>
            `)
        })

        $(document).on('click', '.delete-form', function() {
            data_id = $(this).data('id')
            $(".parent-" + data_id).remove()
        })
        // Add event listener for keyup event on kuantitas input field
        // $(document).on('keyup', `[name="kuantitas[]"]`, function() {
        //     console.log($("#sampah-" + $(this).data('id'))[0]);
        //     getSampahDetail($("#sampah-" + $(this).data('id'))[0])
        // });


        function gettotal(num) {

            var sampahId = $(num).attr('data-id');
            var nilai = num.value;
            // Send AJAX request to fetch sampah details
            $.ajax({
                url: '/get-harga-beli/' + sampahId,
                type: 'GET',
                success: function(response) {

                    var hargaBeli = response.harga_beli;
                    var kuantitas = nilai;
                    var total = hargaBeli * kuantitas;

                    console.log(hargaBeli)
                    console.log(kuantitas)

                    $(`#total-` + sampahId).val(total)
                }
            });
        }
    </script>
</body>

</html>
