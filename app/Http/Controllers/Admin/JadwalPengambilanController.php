<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\JadwalPengambilan;
use App\Models\BankSampah;
use App\Models\PenjualanSampah;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class JadwalPengambilanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     private $penjualanSampah;

    public function __construct()
    {
        $this->middleware('auth');
        $this->PenjualanSampah = new PenjualanSampah();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $jadwalpengambilan = JadwalPengambilan::with('petugas')->latest()->paginate($perPage);
        $data['jadwalpengambilan'] = $jadwalpengambilan;
        return view('admin.jadwal-pengambilan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $data['penjualan'] = PenjualanSampah::where('status_penjualan', 'Menunggu Konfirmasi Admin')->pluck('id','id');
        $data['penjualan'] = PenjualanSampah::with('nasabah')->where('status_penjualan','Menunggu Konfirmasi Admin')->groupBy('id_nasabah')->get();
        $data['petugas'] = User::where('role', 'petugas')->pluck('name','id');
        
        return view('admin.jadwal-pengambilan.create', $data);
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
        $jadwal = $request->tanggal;
        $now = Carbon::now()->format('Y-m-d');

        if ($jadwal < $now) {
            alert()->error('New JadwalPengambilan Error!');
        } else {
            $requestData['status'] = 'Jadwal Telah Dibuat';
                $jadwalPengambilan = new JadwalPengambilan();
                $jadwalPengambilan->id_penjualan = $requestData['id_penjualan'];
                $jadwalPengambilan->id_petugas = $requestData['id_petugas'];
                $jadwalPengambilan->tanggal = $requestData['tanggal'];
                $jadwalPengambilan->status = $requestData['status'];
                $jadwalPengambilan->save();

                $penjualanSampah = PenjualanSampah::find($requestData['id_penjualan']);
                $penjualanSampah->status_penjualan = 'Menunggu Kedatangan Petugas';
                $penjualanSampah->save();

            alert()->success('New JadwalPengambilan Created!');
        }

        return redirect('admin/jadwal-pengambilan');
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
        $jadwalpengambilan = JadwalPengambilan::findOrFail($id);

        return view('admin.jadwal-pengambilan.show', compact('jadwalpengambilan'));
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
        $jadwalpengambilan = JadwalPengambilan::findOrFail($id);
        $data['jadwalpengambilan'] = $jadwalpengambilan;
        $data['penjualan'] = PenjualanSampah::where('status_penjualan', 'Menunggu Konfirmasi Admin')->pluck('id','id');
        $data['petugas'] = User::where('role', 'petugas')->pluck('name','id');
        return view('admin.jadwal-pengambilan.edit', $data);
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
        
        $jadwalpengambilan = JadwalPengambilan::findOrFail($id);
        alert()->success('Record Updated!' );
        $jadwalpengambilan->update($requestData);

        return redirect('admin/jadwal-pengambilan');
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
        JadwalPengambilan::destroy($id);

        return redirect('admin/jadwal-pengambilan');
    }
}
