@extends('admin.layout.master')

@section('content')
    @php

        use App\Models\PembelianSampahDetail;
        use App\Models\PenjualanSampahDetail;
        use App\Models\PenjualanSampah;
        use App\Models\PembelianSampah;

    @endphp
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="d-flex align-items-center">
                    <h5 class="page-title">Beranda</h5>
                    <ul class="breadcrumb ml-2">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">Transaksi Sampah</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Transaksi Sampah</h4>
                    {{-- <a href="{{ url('/admin/transaksi-sampah'. '/create') }}" class="btn btn-success mr-2"><i class="fa fa-plus mr-1"></i> Add New</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jenis Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksisampah as $i => $item)
                                    @php
                                        if ($item->jenis_transaksi === 'Pembelian') {
                                            $beli = PembelianSampah::with('pengepul')
                                                ->where('id', '=', $item->id_jualbeli)
                                                ->first();

                                            $name = $beli->pengepul->name;
                                            $status = $beli->status_pembelian;
                                        } else {
                                            $jual = PenjualanSampah::with('nasabah')
                                                ->where('id', '=', $item->id_jualbeli)
                                                ->first();

                                            $name = $jual->nasabah->name;
                                            $status = $jual->status_penjualan;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $name }}</td>
                                        <td>{{ $item->tanggal_transaksi }}</td>
                                        <td>{{ $item->jenis_transaksi }}</td>
                                        <td>{{ $status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
