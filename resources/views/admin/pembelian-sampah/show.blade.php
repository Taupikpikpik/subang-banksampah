@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Dashboard</h5>
                <ul class="breadcrumb ml-2">
                <li class="breadcrumb-item">
                    <a href="{{url('/admin')}}">
                    <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{url('/admin')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">PembelianSampah Detail</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detail</h5>
            </div>
            <div class="card-body">
                <table class="table" id="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $pembeliansampah->id }}</td>
                        </tr>
                        <tr><th> Id Sampah </th><td> {{ $pembeliansampah->id_sampah }} </td></tr><tr><th> Id Pengepul </th><td> {{ $pembeliansampah->id_pengepul }} </td></tr><tr><th> Kuantitas </th><td> {{ $pembeliansampah->kuantitas }} </td></tr><tr><th> Total </th><td> {{ $pembeliansampah->total }} </td></tr><tr><th> Status Pembelian </th><td> {{ $pembeliansampah->status_pembelian }} </td></tr><tr><th> Kode Pembelian </th><td> {{ $pembeliansampah->kode_pembelian }} </td></tr><tr><th> Bukti Pembayaran </th><td> {{ $pembeliansampah->bukti_pembayaran }} </td></tr>
                    </tbody>
                </table>
            <a href="{{ url('/admin/pembelian-sampah') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
