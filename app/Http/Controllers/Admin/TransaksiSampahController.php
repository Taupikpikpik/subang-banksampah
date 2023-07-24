<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\TransaksiSampah;
use Illuminate\Http\Request;

class TransaksiSampahController extends Controller
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
        $transaksisampah = TransaksiSampah::with('sampah')->latest()->paginate($perPage);
     
        $data['transaksisampah'] = $transaksisampah;
        return view('admin.transaksi-sampah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.transaksi-sampah.create');
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
        
        TransaksiSampah::create($requestData);
        alert()->success('New ' . 'TransaksiSampah'. ' Created!' );

        return redirect('admin/transaksi-sampah');
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
        $transaksisampah = TransaksiSampah::findOrFail($id);

        return view('admin.transaksi-sampah.show', compact('transaksisampah'));
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
        $transaksisampah = TransaksiSampah::findOrFail($id);
        $data['transaksisampah'] = $transaksisampah;
        return view('admin.transaksi-sampah.edit', $data);
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
        
        $transaksisampah = TransaksiSampah::findOrFail($id);
        alert()->success('Record Updated!' );
        $transaksisampah->update($requestData);

        return redirect('admin/transaksi-sampah');
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
        TransaksiSampah::destroy($id);

        return redirect('admin/transaksi-sampah');
    }
}
