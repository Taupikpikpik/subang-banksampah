@extends('admin.layout.master')

@section('content')
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
                        <li class="breadcrumb-item active">Data Sampah</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Sampah</h4>
                    <a href="{{ url('/admin/bank-sampah' . '/create') }}" class="btn btn-success mr-2"><i
                            class="fa fa-plus mr-1"></i> Tambah Baru </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Sampah</th>
                                    <th>Kategori Sampah</th>
                                    <th>Stok/KG</th>
                                    <th>Harga Beli/RP</th>
                                    <th>Harga Jual/RP</th>
                                    <th>Status</th>
                                    <th>Icon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banksampah as $i => $item)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $item->nama_sampah }}</td>
                                        <td>{{ $item->kategori->nama_kategori }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->harga_beli }}</td>
                                        <td>{{ $item->harga_jual }}</td>
                                        <td>{{ $item->status_sampah }}</td>
                                        <td><img src="{{ asset('uploads/images') . '/' . $item->icon }}" width="70%">
                                        </td>
                                        <td class="text-left">
                                            <a href="{{ url('/admin/bank-sampah/' . $item->id) }}"
                                                class="btn btn-sm btn-primary btn-rounded mr-2">
                                                <i class="far fa-eye mr-1"></i> Lihat </a>
                                            <a href="{{ url('/admin/bank-sampah/' . $item->id . '/edit') }}"
                                                class="btn btn-sm btn-warning btn-rounded mr-2">
                                                <i class="far fa-edit mr-1"></i> Ubah </a>
                                        </td>
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
