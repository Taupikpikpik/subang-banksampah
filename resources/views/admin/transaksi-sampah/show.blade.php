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
                <li class="breadcrumb-item active">TransaksiSampah Detail</li>
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
                            <td>{{ $transaksisampah->id }}</td>
                        </tr>
                        <tr><th> Id Sampah </th><td> {{ $transaksisampah->id_sampah }} </td></tr><tr><th> Kuantitas </th><td> {{ $transaksisampah->kuantitas }} </td></tr><tr><th> Tanggal Transaksi </th><td> {{ $transaksisampah->tanggal_transaksi }} </td></tr><tr><th> Jenis Transaksi </th><td> {{ $transaksisampah->jenis_transaksi }} </td></tr>
                    </tbody>
                </table>
            <a href="{{ url('/admin/transaksi-sampah') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
