@extends('admin.layout.master')

@section('content')
    <div class="row">
        {{-- <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
            <div class="card detail-box1 details-box">
            <div class="card-body">
                <div class="dash-contetnt">
                <div class="mb-3">
                    <img src="assets/img/icons/accident.svg" alt="" width="26">
                </div>
                <h4 class="text-white">Saldo</h4>
                <h2 class="text-white">Rp. {{number_format($saldo,2,',',',')}}</h2>
                </div>
            </div>
            </div>
        </div> --}}
        <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
            <div class="card detail-box1 details-box">
                <div class="card-body">
                    <div class="dash-contetnt">
                        <div class="mb-3">
                            <img src="assets/img/icons/visits.svg" alt="" width="26">
                        </div>
                        <h4 class="text-white">Total Nasabah</h4>
                        <h2 class="text-white">{{ $nasabah }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
            <div class="card detail-box3 details-box">
                <div class="card-body">
                    <div class="dash-contetnt">
                        <div class="mb-3">
                            <img src="assets/img/icons/hospital-bed.svg" alt="" width="26">
                        </div>
                        <h4 class="text-white">Total Jenis Sampah</h4>
                        <h2 class="text-white">{{ $sampah }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
            <div class="card detail-box4 details-box">
                <div class="card-body">
                    <div class="dash-contetnt">
                        <div class="mb-3">
                            <img src="assets/img/icons/operating.svg" alt="" width="26">
                        </div>
                        <h4 class="text-white">Total Transaksi</h4>
                        <h2 class="text-white">{{ $transaksi }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card detail-box5 details-box">
                <div class="card-body">
                    <div class="dash-contetnt">
                        <div class="mb-3">
                            <img src="assets/img/icons/operating.svg" alt="" width="26">
                        </div>
                        <small class="float-end text-white">{{ \Carbon\Carbon::now()->format('d-M-Y') }}</small>
                        <h4 class="text-white">Jadwal Hari Ini</h4>
                        @foreach ($jadwal as $data)
                            <h6 class="text-white">{{ $loop->iteration }}.
                                {{ isset($data->penjualan) ? $data->penjualan->nasabah->name : '' }} |
                                {{ isset($data->penjualan) ? $data->penjualan->nasabah->address : '' }} |
                                {{ isset($data->penjualan) ? $data->penjualan->sampah->nama_sampah : '' }}</h6>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a href="#" class="btn btn-primary" onclick="bar2()">Lihat Chart</a>
        </div>
        <div id="barpeminjaman" class="col-12 col-md-4 col-lg-8">

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script>
        function bar2() {
            $("#barpeminjaman").html(`<canvas id="barChart" style="max-height: 400px;"></canvas>`);
            $.ajax({
                type: "get",
                url: "{{ url('chart') }}",
                success: function(data) {
                    var h = data.h;
                    var v = data.v;
                    var barc = document.getElementById("barChart").getContext('2d');
                    new Chart(barc, {
                        type: 'bar',
                        data: {
                            labels: h,
                            datasets: [{
                                label: 'Jumlah Pembelian',
                                data: v,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',

                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',

                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Grafik',
                                    font: {
                                        size: 24
                                    }
                                }
                            }
                        }
                    });


                }
            })
        };
    </script>
@endsection
