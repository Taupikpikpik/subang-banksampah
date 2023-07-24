<!DOCTYPE html>
<html>
<head>
    <title>Report Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 1600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <img src="{{asset('head.jpg')}}" class="img-responsive center-block">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <u><b><h3>Laporan Pembelian Periode {{$start_date}} - {{$end_date}}</h3></b></u>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table" id="table" id="report">
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
                        @php
                            dd($item);
                        @endphp
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $item->pengepul->name }}</td>
                            <td>{{ $item->sampah->nama_sampah }}</td>
                            <td>{{ $item->kuantitas }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ date("Y-m-d", strtotime($item->updated_at)) }}</td>
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
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-right">
                {{-- <img src="{{asset('sign.png')}}" style="width:100px;" alt="Signature" class="img-fluid"> --}}
                <b><p class="mt-3">{{Auth::user()->name}}</p></b>
                <p class="mt-3">Admin Bank Sampah Induk</p>
            </div>
            </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Print the page as PDF when the document is ready
    window.print();

    // Close the window after the print dialog is closed
    $(window).on('afterprint', function() {
        window.close();
    });
    });
</script>
</body>
</html>
