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
                <li class="breadcrumb-item active">PenjualanSampah Detail</li>
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
                            <td>{{ $penjualansampah->id }}</td>
                        </tr>
                        <tr><th> Id Sampah </th><td> {{ $penjualansampah->id_sampah }} </td></tr><tr><th> Id Nasabah </th><td> {{ $penjualansampah->id_nasabah }} </td></tr><tr><th> Kuantitas </th><td> {{ $penjualansampah->kuantitas }} </td></tr><tr><th> Total </th><td> {{ $penjualansampah->total }} </td></tr><tr><th> Status Penjualan </th><td> {{ $penjualansampah->status_penjualan }} </td></tr>
                    </tbody>
                </table>
            <a href="{{ url('/admin/penjualan-sampah') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
