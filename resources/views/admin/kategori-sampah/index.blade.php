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
                <li class="breadcrumb-item active">Kategori Sampah</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kategori Sampah</h4>
                        <a href="{{ url('/admin/kategori-sampah'. '/create') }}" class="btn btn-success mr-2"><i class="fa fa-plus mr-1"></i> Tambah Baru </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kategori</th>
                                <th>Icon</th>
                                <th>aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kategorisampah as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td><img src="{{asset('uploads/images')}}/{{$item->icon}}" style="width:30px;"> </td>
                                <td class="text-left">
                                {{-- <a href="{{ url('/admin/kategori-sampah/' . $item->id) }}" class="btn btn-sm btn-primary btn-rounded mr-2">
                                    <i class="far fa-eye mr-1"></i> View </a> --}}
                                <a href="{{ url('/admin/kategori-sampah/' . $item->id . '/edit') }}" class="btn btn-sm btn-warning btn-rounded mr-2">
                                    <i class="far fa-edit mr-1"></i> Ubah </a>
                                {{-- <button type="button" class="btn btn-sm btn-danger btn-rounded mr-2" data-toggle="modal"
                                        data-target="#deleteConfirm{{$item->id}}"><i class="fa fa-trash-alt" aria-hidden="true"></i> Hapus </button>
                                    <div class="modal fade" id="deleteConfirm{{$item->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="modal-block-popout" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Anda yakin untuk menghapus data?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'url' => ['/admin/kategori-sampah', $item->id],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                    {!! Form::button('Delete', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-sm',
                                                            'title' => 'Confirm Delete'
                                                    )) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
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
