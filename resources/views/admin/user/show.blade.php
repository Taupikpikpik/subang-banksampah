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
                        <li class="breadcrumb-item active">Detail Pengguna</li>
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
                                <th> Nik </th>
                                <td> {{ $user->nik }} </td>
                            </tr>
                            <tr>
                                <th> Nama </th>
                                <td> {{ Str::ucfirst($user->name) }} </td>
                            </tr>
                            <tr>
                                <th> Peran </th>
                                <td> {{ Str::ucfirst($user->role) }} </td>
                            </tr>
                            @if ($user->role == 'reviewer')
                                <tr>
                                    <th> Jabatan </th>
                                    <td> {{ Str::ucfirst($user->jabatan) }} </td>
                                </tr>
                            @endif
                            <tr>
                                <th> Nomor Hp </th>
                                <td> {{ $user->nomorHp }} </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td> {{ $user->email }} </td>
                            </tr>
                            @if ($user->role == 'nasabah')
                                <tr>
                                    <th> Nomor Tabungan </th>
                                    <td> {{ Str::ucfirst($user->noTabungan) }} </td>
                                </tr>
                                <tr>
                                    <th> Kelurahan </th>
                                    <td> {{ Str::ucfirst($user->kelurahan) }} </td>
                                </tr>
                            @endif
                            <tr>
                                <th> alamat </th>
                                <td> {{ Str::ucfirst($user->address) }} </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('/admin/user') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close"
                                aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
