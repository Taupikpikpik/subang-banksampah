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
                        <li class="breadcrumb-item active">Jadwal Pengambilan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Jadwal Pengambilan</h4>
                    {{-- <a href="{{ url('/admin/jadwal-pengambilan' . '/create') }}" class="btn btn-success mr-2"><i
                            class="fa fa-plus mr-1"></i> Buat Jadwal </a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Nasabah</th>
                                    <th>Alamat Nasabah</th>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Status</th>
                                    <th>Pilih Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->address }}</td>
                                        <td>{{ $item->hari }}</td>
                                        <td>{{ $item->jam_start }}</td>
                                        <td>{{ $item->jam_end }}</td>
                                        <td>{{ $item->penjualan->status_penjualan }}</td>
                                        <td>
                                            @if (!$item->id_petugas)
                                                <form action="/updateJadwal/petugas/{{ $item->id }}" method="post">
                                                    @csrf
                                                    <select name="petugas" class="form-control">
                                                        @foreach ($petugas as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <button class="submit btn btn-sm btn-primary">Pilih</button>
                                                </form>
                                            @else
                                                {{ $item->petugas->name }}
                                            @endif
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
