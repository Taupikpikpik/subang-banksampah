@extends('reviewer.layout.master')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <h5 class="page-title">Beranda</h5>
                <ul class="breadcrumb ml-2">
                    <li class="breadcrumb-item">
                        <a href="{{url('/reviewer')}}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{url('/reviewer')}}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Laporan Pembelian Sampah</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Laporan Pembelian Sampah</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form action="{{ url('/reviewer/laporan-pembelian') }}" method="get">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="start_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="end_date">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                @if($start_date && $end_date != null)
                <div class="table-responsive">
                    <table class="table" id="table" id="report">
                        <h3>Laporan Pembelian Sampah Dari Tanggal {{$start_date}} - {{$end_date}}</h3>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pengepul</th>
                                <th>Nama Sampah</th>
                                <th>Kuantitas</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembelian as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->pengepul->name }}</td>
                                <td>{{ $item->sampah->nama_sampah }}</td>
                                <td>{{ $item->kuantitas }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->status_pembelian }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" align="right"><strong>Total:</strong></td>
                                <td>{{ $total_pembayaran }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <form action="{{route('export.pembelian')}}" method="get">
                        {{ csrf_field() }}
                        <input type="hidden" name="start_date" value="{{$start_date}}">
                        <input type="hidden" name="end_date" value="{{$end_date}}">
                        <input type="hidden" name="pembelian" value="{{$pembelian}}">
                        <input type="hidden" name="total_pembayaran" value="{{$total_pembayaran}}">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf"> Export PDF</i></button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
  // Add an event listener to the export button
  document.getElementById('export-btn').addEventListener('click', function () {
    // Get the table element by its ID
    var table = document.getElementById('report');

    // Convert the table to a worksheet object
    var worksheet = XLSX.utils.table_to_sheet(table);

    // Create a new workbook and add the worksheet
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

    // Export the workbook to Excel file
    XLSX.writeFile(workbook, 'laporan-pembelian.xlsx');
  });
</script>
@endsection