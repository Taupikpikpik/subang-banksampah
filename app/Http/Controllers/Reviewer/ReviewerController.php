<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Saldo;
use App\Models\BankSampah;
use App\Models\TransaksiSampah;
use App\Models\PenjualanSampah;
use App\Models\PembelianSampah;
use Auth;
use Alert;
use Illuminate\Http\Request;


class ReviewerController extends Controller
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
    public function index()
    {
        if(Auth::user()->role != 'reviewer') {
            alert()->error('Akses Dilarang');
            return redirect()->back();
        }
        $data['saldo'] = Saldo::find(1)->value('jumlah_saldo');
        $data['nasabah'] = User::where('role', 'nasabah')->count();
        $data['sampah'] = BankSampah::count();
        $data['transaksi'] = TransaksiSampah::count();
        return view('reviewer.dashboard', $data);
    }

    public function reportPenjualan(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if($request->start_date != null && $request->end_date != null) {
            $penjualan = PenjualanSampah::where('status_penjualan', 'Penjualan Berhasil')
                ->whereDate('updated_at', '>=', $start_date)
                ->whereDate('updated_at', '<=',  $end_date)
                ->get();

            // Calculate the total pembayaran
            $total_pembayaran = $penjualan->sum('total');
            return view('reviewer.laporan-penjualan', compact('penjualan', 'total_pembayaran', 'start_date', 'end_date'));
        } else {
            return view('reviewer.laporan-penjualan', compact('start_date', 'end_date'));

        }

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
            return view('reviewer.laporan-pembelian', compact('pembelian', 'total_pembayaran', 'start_date', 'end_date'));
        } else {
            return view('reviewer.laporan-pembelian', compact('start_date', 'end_date'));

        }

    }
}
