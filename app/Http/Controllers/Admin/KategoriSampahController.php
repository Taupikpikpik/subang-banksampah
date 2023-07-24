<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;

class KategoriSampahController extends Controller
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
        $kategorisampah = KategoriSampah::latest()->paginate($perPage);
        $data['kategorisampah'] = $kategorisampah;
        return view('admin.kategori-sampah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kategori-sampah.create');
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
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $nama_icon = $request->file('icon')->getClientOriginalName();
            $icon->move('uploads/images', $nama_icon);
            $requestData['icon'] = $nama_icon;
        }
        KategoriSampah::create($requestData);
        alert()->success('New ' . 'KategoriSampah'. ' Created!' );

        return redirect('admin/kategori-sampah');
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
        $kategorisampah = KategoriSampah::findOrFail($id);

        return view('admin.kategori-sampah.show', compact('kategorisampah'));
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
        $kategorisampah = KategoriSampah::findOrFail($id);
        $data['kategorisampah'] = $kategorisampah;
        return view('admin.kategori-sampah.edit', $data);
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
        
        $kategorisampah = KategoriSampah::findOrFail($id);
        alert()->success('Record Updated!' );
        $kategorisampah->update($requestData);

        return redirect('admin/kategori-sampah');
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
        KategoriSampah::destroy($id);

        return redirect('admin/kategori-sampah');
    }
}
