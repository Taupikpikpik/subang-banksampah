<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\PembelianSampah;
use App\Models\PembelianSampahDetail;
use App\Models\Saldo;
use App\Models\BankSampah;
use App\Models\TransaksiSampah;
use Illuminate\Http\Request;

class PembelianSampahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $pembeliansampah = PembelianSampah::latest()->paginate($perPage);
        $data['pembeliansampah'] = $pembeliansampah;
        return view('admin.pembelian-sampah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pembelian-sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('bukti_pembayaran')) {
            $requestData['bukti_pembayaran'] = $request->file('bukti_pembayaran')
                ->store('', 'uploads');
        }

        PembelianSampah::create($requestData);
        alert()->success('New ' . 'PembelianSampah'. ' Created!' );

        return redirect('admin/pembelian-sampah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pembeliansampah = PembelianSampah::findOrFail($id);

        return view('admin.pembelian-sampah.show', compact('pembeliansampah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pembeliansampah = PembelianSampah::findOrFail($id);
        $data['pembeliansampah'] = $pembeliansampah;
        return view('admin.pembelian-sampah.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('bukti_pembayaran')) {
            $requestData['bukti_pembayaran'] = $request->file('bukti_pembayaran')
                ->store('', 'uploads');
        }

        $pembeliansampah = PembelianSampah::findOrFail($id);
        alert()->success('Record Updated!' );
        $pembeliansampah->update($requestData);

        return redirect('admin/pembelian-sampah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        alert()->success('Record Deleted!' );
        PembelianSampah::destroy($id);

        return redirect('admin/pembelian-sampah');
    }

    public function approve($id)
    {
        $pembelian = PembelianSampah::find($id);
        $pembelian->status_pembelian = 'Pembelian Berhasil';
        $pembelian->save();

        $pembeliandetail = PembelianSampahDetail::where('id_pembelian_sampah',$id)->get();
   

        

        $saldo = Saldo::find(1);
        $saldo->jumlah_saldo += $pembelian->total;
        $saldo->save();

        alert()->success('Pembelian Disetujui' );

        return redirect('admin/pembelian-sampah');
    }

    public function reject($id, Request $request)
    {
        $pembelian = PembelianSampah::find($id);

        $pembelian->update([
            'status_pembelian' => 'Pembelian Ditolak',
            'ket' => $request->input('ket'),
        ]);

        $pembelian = PembelianSampahDetail::where('id_pembelian_sampah',$id)->get();
        foreach ($pembelian as $value) {
            $sampah = BankSampah::find($value->id_sampah);
            $sampah->stok += $value->kuantitas;
            $sampah->save();
        }

        alert()->success('Pembelian Ditolak' );

        return redirect('admin/pembelian-sampah');
    }
}
