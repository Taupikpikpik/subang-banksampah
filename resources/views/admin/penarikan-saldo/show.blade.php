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
                <li class="breadcrumb-item active">PenarikanSaldo Detail</li>
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
                            <td>{{ $penarikansaldo->id }}</td>
                        </tr>
                        <tr><th> Id Saldo </th><td> {{ $penarikansaldo->id_saldo }} </td></tr><tr><th> Jumlah </th><td> {{ $penarikansaldo->jumlah }} </td></tr><tr><th> Kode </th><td> {{ $penarikansaldo->kode }} </td></tr><tr><th> Status </th><td> {{ $penarikansaldo->status }} </td></tr>
                    </tbody>
                </table>
            <a href="{{ url('/admin/penarikan-saldo') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
