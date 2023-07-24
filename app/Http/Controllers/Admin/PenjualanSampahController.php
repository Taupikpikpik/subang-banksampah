<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\PenjualanSampah;
use Illuminate\Http\Request;

class PenjualanSampahController extends Controller
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
        $penjualansampah = PenjualanSampah::with('sampah', 'nasabah')->latest()->paginate($perPage);
        $data['penjualansampah'] = $penjualansampah;
        return view('admin.penjualan-sampah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.penjualan-sampah.create');
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
        
        PenjualanSampah::create($requestData);
        alert()->success('New ' . 'PenjualanSampah'. ' Created!' );

        return redirect('admin/penjualan-sampah');
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
        $penjualansampah = PenjualanSampah::findOrFail($id);

        return view('admin.penjualan-sampah.show', compact('penjualansampah'));
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
        $penjualansampah = PenjualanSampah::findOrFail($id);
        $data['penjualansampah'] = $penjualansampah;
        return view('admin.penjualan-sampah.edit', $data);
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
        
        $penjualansampah = PenjualanSampah::findOrFail($id);
        alert()->success('Record Updated!' );
        $penjualansampah->update($requestData);

        return redirect('admin/penjualan-sampah');
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
        PenjualanSampah::destroy($id);

        return redirect('admin/penjualan-sampah');
    }
}
