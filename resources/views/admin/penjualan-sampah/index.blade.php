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
                <li class="breadcrumb-item active">Penjualan Sampah</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Penjualan Sampah</h4>
                        {{-- <a href="{{ url('/admin/penjualan-sampah'. '/create') }}" class="btn btn-success mr-2"><i class="fa fa-plus mr-1"></i> Add New</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Nasabah</th>
                                <th>Tanggal</th>
                                <th>Status Penjualan</th>
                                <th>Detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($penjualansampah as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->nasabah->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status_penjualan }}</td>
                                <td>
                                    <button type="button" onclick="detailData(<?= $item->id ?>)" class="btn btn-info text-white">Detail</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
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
                url: '/get-detail-penjualan/' + num,
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