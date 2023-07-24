@extends('reviewer.layout.master')

@section('content')
<div class="row">
        <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
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
        </div>
        <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
            <div class="card detail-box2 details-box">
            <div class="card-body">
                <div class="dash-contetnt">
                <div class="mb-3">
                    <img src="assets/img/icons/visits.svg" alt="" width="26">
                </div>
                <h4 class="text-white">Total Nasabah</h4>
                <h2 class="text-white">{{$nasabah}}</h2>
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
                <h2 class="text-white">{{$sampah}}</h2>
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
                <h2 class="text-white">{{$transaksi}}</h2>
                </div>
            </div>
            </div>
        </div>
</div>
@endsection
