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
                <li class="breadcrumb-item active">BankSampah</li>
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
                            <td>{{ $banksampah->id }}</td>
                        </tr>
                        <tr><th> Nama Sampah </th><td> {{ $banksampah->nama_sampah }} </td></tr><tr><th> Stok/KG </th><td> {{ $banksampah->stok }} </td></tr><tr><th> Harga Beli/RP </th><td> {{ $banksampah->harga_beli }} </td></tr><tr><th> Harga Jual/RP </th><td> {{ $banksampah->harga_jual }} </td></tr>
                    </tbody>
                </table>
            <a href="{{ url('/admin/bank-sampah') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali </button></a>
            </div>
        </div>
    </div>
</div>
@endsection
