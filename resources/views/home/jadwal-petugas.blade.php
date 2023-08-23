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
                    <h5 class="mb-0">Daftar Jadwal Pengambilan</h5>
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
                @foreach ($jadwal as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm product mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col ps-0 align-self-center">
                                        {{-- <p class="mb-0">
                                            <small class="text-opac">Nomor Penjualan : {{ $item->id }}</small>
                                        </p> --}}
                                        <h6 class="text-color-theme">Nasabah : {{ $item->penjualan->nasabah->name }}
                                        </h6>
                                        <h6 class="text-color-theme">Alamat : {{ $item->penjualan->nasabah->address }}
                                        </h6>
                                        <h6 class="text-color-theme">Tanggal : {{ $item->hari }}</h6>
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-primary">Status :
                                                    {{ $item->penjualan->status_penjualan }}</p>
                                            </div>
                                        </div>
                                        @if ($item->penjualan->status_penjualan != 'Penjualan Berhasil')
                                            <div class="row">
                                                <div class="d-grid">
                                                    <button class="btn btn-sm btn-warning shadow-sm mt-2 mb-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ubah{{ $item->id }}">Ubah Data</button>
                                                </div>
                                                {{-- <button class="btn btn-sm btn-default shadow-sm mb-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#approve{{ $item->id }}">Selesaikan
                                                        Transaksi</button>

                                                <!-- add cart modal -->
                                                <div class="modal fade" id="approve{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content product border-0 shadow-sm">
                                                            <div class="modal-body">
                                                                <h3>Apakah anda ingin menyelesaikan transaksi?</h3>
                                                            </div>
                                                            <form
                                                                action="{{ url('petugas/jadwal') }}/{{ $item->id }}"
                                                                method="get">
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-link text-color-theme"
                                                                        data-bs-dismiss="modal">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <div class="modal fade" id="ubah{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                        <div class="modal-content product border-0 shadow-sm">
                                                            <form
                                                                action="{{ url('petugas/jadwal') }}/{{ $item->id }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <h3>Ubah Data</h3>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label>Sampah</label>
                                                                            @foreach ($detail as $sampah)
                                                                                @if ($item->id_penjualan == $sampah->id_penjualan_sampah)
                                                                                    <br>
                                                                                    @php
                                                                                        $total = null;
                                                                                    @endphp
                                                                                    <select name="sampah"
                                                                                        class="from-controll">
                                                                                        @foreach ($sampahs as $itemm)
                                                                                            <option
                                                                                                value="{{ $itemm->id }}"
                                                                                                @if ($itemm->nama_sampah == $sampah->sampah->nama_sampah) selected @endif>
                                                                                                {{ $itemm->nama_sampah }}
                                                                                            </option>
                                                                                        @endforeach

                                                                                    </select>
                                                                                    {{-- =>{{ $sampah->sampah->nama_sampah }} --}}
                                                                                    <input type="text"
                                                                                        name="detail_id"
                                                                                        value="{{ $sampah->id }}"
                                                                                        hidden>
                                                                                    <div class="form-floating mb-3">
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            data-id="1"
                                                                                            name="kuantitas"
                                                                                            placeholder="Kuantitas"
                                                                                            value="{{ $sampah->kuantitas }}"
                                                                                            data-price="{{ $sampah->sampah->harga_beli }}">
                                                                                        <label
                                                                                            for="city">Kuantitas</label>
                                                                                    </div>
                                                                                    <div class="form-floating mb-3">
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            data-id="1"
                                                                                            name="total" readonly
                                                                                            value="{{ $sampah->total }}">
                                                                                        <label for="city">Harga
                                                                                            Total</label>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-link text-color-theme"
                                                                        data-bs-dismiss="modal">Ya</button>
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
@foreach ($detail as $sampah)
    <script>
        // Function to update the total price based on the quantity
        function updateTotalPrice(inputElement) {
            var quantity = parseFloat(inputElement.value);
            var pricePerUnit = parseFloat(inputElement.dataset.price);
            var totalElement = inputElement.closest('.form-floating').nextElementSibling.querySelector(
                'input[name="total"]');
            var total = isNaN(quantity) ? 0 : quantity * pricePerUnit;
            totalElement.value = total.toFixed(2);
        }

        // Listen for change event on quantity input elements
        var quantityInputs = document.querySelectorAll('input[name="kuantitas"]');
        quantityInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                updateTotalPrice(input);
            });
        });

        // Calculate the initial total price when the page loads
        var initialQuantityInputs = document.querySelectorAll('input[name="kuantitas"]');
        initialQuantityInputs.forEach(function(input) {
            updateTotalPrice(input);
        });
    </script>
@endforeach

</html>
