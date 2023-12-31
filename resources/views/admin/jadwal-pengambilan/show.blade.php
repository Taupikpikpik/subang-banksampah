@extends('admin.layout.master')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Beranda</h5>
                <ul class="breadcrumb ml-2">
                <li class="breadcrumb-item">
                    <a href="{{url('/admin')}}">
                    <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{url('/admin')}}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">JadwalPengambilan Detail</li>
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
                            <td hidden>{{ $jadwalpengambilan->id }}</td>
                        </tr>
                        <tr><th> Nasabah </th><td> {{ $jadwalpengambilan->penjualan->nasabah->name }} </td></tr><tr><th>Petugas </th><td> {{ $jadwalpengambilan->petugas->name }} </td></tr><tr><th> Tanggal </th><td> {{ $jadwalpengambilan->tanggal }} </td></tr><tr><th> Status </th><td> {{ $jadwalpengambilan->status }} </td></tr>
                    </tbody>
                </table>
            <a href="{{ url('/admin/jadwal-pengambilan') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
