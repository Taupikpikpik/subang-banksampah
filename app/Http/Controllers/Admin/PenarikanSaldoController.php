<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\PenarikanSaldo;
use App\Models\Saldo;
use Illuminate\Http\Request;

class PenarikanSaldoController extends Controller
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
        $penarikansaldo = PenarikanSaldo::with('nasabah')->latest()->paginate($perPage);
        $data['penarikansaldo'] = $penarikansaldo;
        return view('admin.penarikan-saldo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.penarikan-saldo.create');
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

        PenarikanSaldo::create($requestData);
        alert()->success('New ' . 'PenarikanSaldo' . ' Created!');

        return redirect('admin/penarikan-saldo');
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
        $penarikansaldo = PenarikanSaldo::findOrFail($id);

        return view('admin.penarikan-saldo.show', compact('penarikansaldo'));
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
        $penarikansaldo = PenarikanSaldo::findOrFail($id);
        $data['penarikansaldo'] = $penarikansaldo;
        return view('admin.penarikan-saldo.edit', $data);
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

        $penarikansaldo = PenarikanSaldo::findOrFail($id);
        alert()->success('Record Updated!');
        $penarikansaldo->update($requestData);

        return redirect('admin/penarikan-saldo');
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
        alert()->success('Record Deleted!');
        PenarikanSaldo::destroy($id);

        return redirect('admin/penarikan-saldo');
    }



    public function approve($id)
    {
        $penarikan = PenarikanSaldo::find($id);
        $penarikan->status = 'Penarikan Berhasil';
        $penarikan->save();

        $saldo = Saldo::find($penarikan->id_saldo);
        $saldo->jumlah_saldo -= $penarikan->jumlah;
        $saldo->save();
        alert()->success('Penarikan Disetuju');

        return redirect('admin/penarikan-saldo');
    }

    public function reject($id, Request $request)
    {
        $penarikan = PenarikanSaldo::find($id);
        $penarikan->update([
            'status' => 'Penarikan Ditolak',
            'ket' => $request->input('ket'),
        ]);

        alert()->success('Penarikan Ditolak');

        return redirect('admin/penarikan-saldo');
    }

    public function izinkan($id, Request $request)
    {
        $penarikan = PenarikanSaldo::find($id);
        $penarikan->update([
            'status' => 'Menunggu Penukaran Kode',
            'ket' => $request->input('ket'),
        ]);

        return redirect('admin/penarikan-saldo');
    }
}
