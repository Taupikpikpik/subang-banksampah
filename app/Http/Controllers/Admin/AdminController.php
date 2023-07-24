<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Saldo;
use App\Models\BankSampah;
use App\Models\TransaksiSampah;
use App\Models\PenjualanSampah;
use App\Models\PenjualanSampahDetail;
use App\Models\PembelianSampah;
use App\Models\JadwalPengambilan;
use Auth;
use Alert;
use DB;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */

     public function chart(Request $request)
    {
        // $dari = $request->dari." "."00:00:00";
        // $sampai = $request->sampai." "."23:59:59";
        $peminjaman= DB::table('pembelian_sampahs')
            ->select('status_pembelian', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('status_pembelian')
            ->get();

        $i = 0;
        $h[0] = "Belum Ada Transaksi";
        $v[0] = 0;
        if($peminjaman <> null){
            foreach($peminjaman as $peminjamans)
            {
                $h[$i] = $peminjamans->status_pembelian;
                $v[$i] = $peminjamans->jumlah;
                $i = $i+1;
            }
        }

        $data = [
            'h' => $h,
            'v' => $v,
        ];

        return $data;
    }

    public function index()
    {
        if(Auth::user()->role != 'admin') {
            alert()->error('Akses Dilarang');
            return redirect()->back();
        }
        $data['saldo'] = Saldo::find(1)->value('jumlah_saldo');
        $data['nasabah'] = User::where('role', 'nasabah')->count();
        $data['sampah'] = BankSampah::count();
        $data['transaksi'] = TransaksiSampah::count();
        $jadwal = JadwalPengambilan::where('status', "Jadwal Telah Dibuat")->get();
        return view('admin.dashboard', $data, compact('jadwal'));
    }

    public function reportPenjualan(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');

        if ($request->start_date != null && $request->end_date != null) {
            $penjualan = PenjualanSampah::whereDate('updated_at', '>=', $start_date)
                ->whereDate('updated_at', '<=',  $end_date);

            // Check if the status is selected or 'Pilih'
            if ($status !== '' && $status !== 'Pilih') {
                $penjualan->where('status_penjualan', $status);
            }

            $penjualan = $penjualan->get();

            // Calculate the total pembayaran
            $total_pembayaran = $penjualan->sum('total');
            return view('admin.laporan-penjualan', compact('penjualan', 'total_pembayaran', 'start_date', 'end_date'));
        } else {
            return view('admin.laporan-penjualan', compact('start_date', 'end_date'));

        }

    }

    public function exportPenjualan(Request $request) {
        $data['start_date'] = $request->input('start_date');
        $data['end_date'] = $request->input('end_date');
        $data['penjualan'] = json_decode($request->penjualan);
        $data['total_pembayaran'] = $request->total_pembayaran;

        return view('admin.export-laporan-penjualan', $data);
    }

    public function reportPembelian(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if($request->start_date != null && $request->end_date != null) {
            $pembelian = PembelianSampah::whereDate('updated_at', '>=', $start_date)
                ->whereDate('updated_at', '<=',  $end_date)
                ->get();

            // Calculate the total pembayaran
            $total_pembayaran = $pembelian->sum('total');
            return view('admin.laporan-pembelian', compact('pembelian', 'total_pembayaran', 'start_date', 'end_date'));
        } else {
            return view('admin.laporan-pembelian', compact('start_date', 'end_date'));

        }
    }

    public function exportPembelian(Request $request) {
        $data['start_date'] = $request->input('start_date');
        $data['end_date'] = $request->input('end_date');
        $data['pembelian'] = json_decode($request->pembelian);
        $data['total_pembayaran'] = $request->total_pembayaran;

        return view('admin.export-laporan-pembelian', $data);
    }
}
