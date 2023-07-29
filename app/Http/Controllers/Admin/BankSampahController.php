<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\Models\KategoriSampah;
use App\Models\BankSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class BankSampahController extends Controller
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
        $banksampah = BankSampah::latest()->paginate($perPage);
        $data['banksampah'] = $banksampah;
        return view('admin.bank-sampah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data['category'] = KategoriSampah::pluck('nama_kategori', 'id');

        return view('admin.bank-sampah.create', $data);
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
            $image = $request->file('icon');
            $originalFileName = $image->getClientOriginalName();
            $encryptedFileName = Crypt::encryptString(pathinfo($originalFileName, PATHINFO_FILENAME));
            $limitedEncryptedFileName = substr($encryptedFileName, 0, 15);

            $nama_icon = $limitedEncryptedFileName . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images', $nama_icon);
            $requestData['icon'] = $nama_icon;
        }
        BankSampah::create($requestData);
        alert()->success('New ' . 'BankSampah' . ' Created!');

        return redirect('admin/bank-sampah');
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
        $banksampah = BankSampah::findOrFail($id);

        return view('admin.bank-sampah.show', compact('banksampah'));
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
        $banksampah = BankSampah::findOrFail($id);
        $data['banksampah'] = $banksampah;
        $data['category'] = KategoriSampah::pluck('nama_kategori', 'id');

        return view('admin.bank-sampah.edit', $data);
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
        $banksampah = BankSampah::findOrFail($id);

        if ($request->hasFile('icon')) {

            $image = $request->file('icon');
            $originalFileName = $image->getClientOriginalName();
            $encryptedFileName = Crypt::encryptString(pathinfo($originalFileName, PATHINFO_FILENAME));
            $limitedEncryptedFileName = substr($encryptedFileName, 0, 15);

            $nama_icon = $limitedEncryptedFileName . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images', $nama_icon);
            $requestData['icon'] = $nama_icon;
        }
        alert()->success('Record Updated!');
        $banksampah->update($requestData);

        return redirect('admin/bank-sampah');
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
        BankSampah::destroy($id);

        return redirect('admin/bank-sampah');
    }
}
