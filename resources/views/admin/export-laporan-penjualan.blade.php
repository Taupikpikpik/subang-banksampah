<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 1600px;
        }
    </style>
</head>

@php
    use Illuminate\Support\Carbon;
    use App\Models\PenjualanSampahDetail;
    Carbon::setLocale('id');
@endphp

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <img src="{{ asset('head.jpg') }}" class="img-responsive center-block">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <u><b>
                        <h3>Laporan Penjualan Periode {{ $start_date }} - {{ $end_date }}</h3>
                    </b></u>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table" id="table" id="report">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nasabah</th>
                            <th>Nama Sampah</th>
                            <th>Kuantitas</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                            $totalHarga = 0; // Initialize a variable to store the total sum
                        @endphp
                        @foreach ($penjualan as $i => $item)
                            @php
                                $detail = PenjualanSampahDetail::with('sampah')
                                    ->where('id_penjualan_sampah', $item->id)
                                    ->get();
                                if (!$detail) {
                                    continue;
                                }
                            @endphp
                            @foreach ($detail as $a => $det)
                                <tr>
                                    @if (count($detail) > 1)
                                        @if ($a < 1)
                                            <td rowspan="2">{{ $i + 1 }}</td>
                                            <td rowspan="2">{{ $item->nasabah->name }}</td>
                                        @endif
                                    @else
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $item->nasabah->name }}</td>
                                    @endif
                                    <td>{{ $det->sampah->nama_sampah }}</td>
                                    <td>{{ $det->kuantitas }}</td>
                                    <td>{{ $det->total }}</td>

                                    @php
                                        // Add the "total" value to the running totalHarga
                                        $totalHarga += $det->total;
                                    @endphp

                                    @if (count($detail) > 1)
                                        @if ($a < 1)
                                            <td rowspan="2">{{ date('Y-m-d', strtotime($item->updated_at)) }}</td>
                                            <td rowspan="2">{{ $item->status_penjualan }}</td>
                                        @endif
                                    @else
                                        <td>{{ date('Y-m-d', strtotime($item->updated_at)) }}</td>
                                        <td>{{ $item->status_penjualan }}</td>
                                    @endif

                                </tr>
                            @endforeach
                            @php
                                $num++;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="right"><strong>Total:</strong></td>
                            <td>{{ $totalHarga }}</td>
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
                <b>
                    <p class="mt-3">{{ Carbon::now()->translatedFormat('l, d-F-Y') }}</p>
                </b>
                <b>
                    <p class="mt-3">{{ Auth::user()->jabatan }}</p>
                </b>
                <br>
                <br>
                <br>
                <b>
                    <p class="mt-3">{{ Auth::user()->name }}</p>
                </b>
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
