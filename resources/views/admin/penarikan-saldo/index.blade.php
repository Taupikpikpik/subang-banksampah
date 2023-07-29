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
                        <li class="breadcrumb-item active">Penarikan Saldo</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Penarikan Saldo</h4>
                    {{-- <a href="{{ url('/admin/penarikan-saldo'. '/create') }}" class="btn btn-success mr-2"><i class="fa fa-plus mr-1"></i> Add New</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nasabah</th>
                                    <th>Jumlah</th>
                                    <th>Kode</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penarikansaldo as $i => $item)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $item->nasabah->name }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td class="text-left">
                                            @if ($item->status == 'Penarikan Diproses')
                                                <button type="button" class="btn btn-sm btn-success btn-rounded mr-2"
                                                    data-toggle="modal" data-target="#izinkan{{ $item->id }}"><i
                                                        class="fa fa-close" aria-hidden="true"></i> Izinkan </button>
                                                <div class="modal fade" id="izinkan{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form class="user"
                                                                    action="/admin/penarikan-saldo/izinkan/{{ $item->id }}"
                                                                    method="post">
                                                                    @csrf
                                                                    Apa anda ingin menyetujui penarikan?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning btn-sm"
                                                                    data-dismiss="modal">Tutup</button>
                                                                {{-- {!! Form::open([
                                                'method' => 'get',
                                                'url' => ['/admin/penarikan-saldo/reject', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('Reject', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Confirm Reject'
                                            )) !!}
                                            {!! Form::close() !!} --}}
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Izinkan</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-sm btn-danger btn-rounded mr-2"
                                                    data-toggle="modal" data-target="#reject{{ $item->id }}"><i
                                                        class="fa fa-close" aria-hidden="true"></i> Tolak </button>
                                                <div class="modal fade" id="reject{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form class="user"
                                                                    action="/admin/penarikan-saldo/reject/{{ $item->id }}"
                                                                    method="post">
                                                                    @csrf
                                                                    Apa anda ingin menolak pengajuan penarikan saldo ini?
                                                                    <div>
                                                                        <textarea name="ket" class="form-control" placeholder="alasan ditolak"></textarea>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning btn-sm"
                                                                    data-dismiss="modal">Tutup</button>
                                                                {{-- {!! Form::open([
                                            'method' => 'get',
                                            'url' => ['/admin/penarikan-saldo/reject', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('Reject', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-sm',
                                                'title' => 'Confirm Reject'
                                        )) !!}
                                        {!! Form::close() !!} --}}
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Tolak</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($item->status == 'Menunggu Penukaran Kode')
                                                <button type="button" class="btn btn-sm btn-success btn-rounded mr-2"
                                                    data-toggle="modal" data-target="#approve{{ $item->id }}"><i
                                                        class="fa fa-check" aria-hidden="true"></i> Konfirmasi </button>
                                                <div class="modal fade" id="approve{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                Apa anda ingin menyelesaikan penarikan saldo ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning btn-sm"
                                                                    data-dismiss="modal">Tutup</button>
                                                                {!! Form::open([
                                                                    'method' => 'get',
                                                                    'url' => ['/admin/penarikan-saldo/approve', $item->id],
                                                                    'style' => 'display:inline',
                                                                ]) !!}
                                                                {!! Form::button('Konfirmasi', [
                                                                    'type' => 'submit',
                                                                    'class' => 'btn btn-success btn-sm',
                                                                    'title' => 'Confirm Approve',
                                                                ]) !!}
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
