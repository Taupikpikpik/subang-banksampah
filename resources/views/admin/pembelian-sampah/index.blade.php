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
                <li class="breadcrumb-item active">Pembelian Sampah</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pembelian Sampah</h4>
                        {{-- <a href="{{ url('/admin/pembelian-sampah'. '/create') }}" class="btn btn-success mr-2"><i class="fa fa-plus mr-1"></i> Add New</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pengepul</th>
                                <th>Tanggal</th>
                                <th>Status Pembelian</th>
                                <th>Kode Pembelian</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pembeliansampah as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->Pengepul->name }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->status_pembelian }}</td>
                                <td>{{ $item->kode_pembelian }}</td>
                                <td class="text-left">
                                        <button type="button" onclick="detailData(<?= $item->id ?>)" class="btn btn-info text-white">Detail</button>
                                @if($item->status_pembelian == 'Menunggu Pengambilan Di Bank Sampah')
                                <button type="button" class="btn btn-sm btn-success btn-rounded mr-2" data-toggle="modal"
                                        data-target="#approve{{$item->id}}"><i class="fa fa-check" aria-hidden="true"></i>Konfirmasi </button>
                                    <div class="modal fade" id="approve{{$item->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="modal-block-popout" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Apa anda ingin menyelesaikan transaksi pembelian ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
                                                    {!! Form::open([
                                                        'method' => 'get',
                                                        'url' => ['/admin/pembelian-sampah/approve', $item->id],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                    {!! Form::button('Konfirmasi', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-success btn-sm',
                                                            'title' => 'Confirm Approve'
                                                    )) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger btn-rounded mr-2" data-toggle="modal"
                                        data-target="#reject{{$item->id}}"><i class="fa fa-close" aria-hidden="true"></i>Tolak </button>
                                    <div class="modal fade" id="reject{{$item->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="modal-block-popout" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form class="user" action="/admin/pembelian-sampah/reject/{{$item->id}}" method="post">
                                                        @csrf
                                                    Apa anda ingin membatalkan transaksi pembelian ini?
                                                    <div>
                                                        <textarea name="ket" class="form-control" placeholder="alasan ditolak"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>
                                                    {{-- {!! Form::open([
                                                        'method' => 'get',
                                                        'url' => ['/admin/pembelian-sampah/reject', $item->id],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                    {!! Form::button('Reject', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-sm',
                                                            'title' => 'Confirm Reject'
                                                    )) !!}
                                                    {!! Form::close() !!} --}}
                                                    <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                                </div>
                                            </form>
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

        <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Pembelian</h5>
                  <button type="button" class="btn btn-secondary btn-close bg-light"></button>
                </div>
                <div class="modal-body modal-detail">
                </div>
              </div>
            </div>
          </div>

@endsection

@include('home.partials.scripts')
    <script>
        function detailData(num) {
            $.ajax({
                url: '/get-detail-pembelian/' + num,
                type: 'GET',
                success: function(res) {
                    let dataSampah = `
                            <tr>
                                <td>No</td>
                                <td>Nama Sampah</td>
                                <td>Kuantitas</td>
                                <td>Total</td>
                            </tr>`
                    let total = 0

                    $.each(res.data, (i,val) => {
                        dataSampah += `
                            <tr>
                                <td>${i+1}</td>
                                <td>${val.sampah.nama_sampah}</td>
                                <td>${val.kuantitas}</td>
                                <td>${val.total}</td>
                            </tr>
                        `
                        total += parseInt(val.total)
                    })
                        dataSampah += `
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>${total}</td>
                            </tr>
                        `

                    $('.modal-detail').html(`
                        <table class='table'>
                            ${dataSampah}
                        </table>
                    `)
                    $('#modalDetail').modal('show')
                }
            });
        }

        $('.btn-close').click(function(){
            $('#modalDetail').modal('hide')
        })
    </script>
