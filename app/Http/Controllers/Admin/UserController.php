<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Alert;
use App\User;
use App\Models\Saldo;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::latest()->get();
        $data['user'] = $users;
        return view('admin.user.index', $data);
    }

    public function create()
    {
        return view('admin.user.create');
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

        $request->validate([
            'email' => 'email|unique:users|required|min:8',
            'nomorHp' => 'unique:users|required|min:6',
            'nik' => 'unique:users|required|min:16|max:16',
            'password' => 'required|min:5',
        ]);

        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            alert()->error('Email Sudah terdaftar');
            return redirect()->back();
        }

        $existingnomorHp = User::where('nomorHp', $request->nomorHp)->first();
        if ($existingnomorHp) {
            alert()->error('nomor HP Sudah terdaftar');
            return redirect()->back();
        }

        $existingnik = User::where('nik', $request->nik)->first();

        if ($existingnik) {
            alert()->error('NIK Sudah terdaftar');
            return redirect()->back();
        }

        $requestData = $request->all();
        $requestData['password'] = bcrypt($request->password);
        if ($request->has('password')) {
            $requestData['password'] = bcrypt($request->password);
        }

        if ($request->role !== 'reviewer') {
            $requestData['jabatan'] = '';
        }

        if ($request->role === 'nasabah') {

            $maxid = (int)User::max('id') + 1;



            $notabungan = $maxid .  substr($request->nik, -4) . date('d');


            $requestData['noTabungan'] = $notabungan;
            $requestData['kelurahan'] = $request->kelurahan;
        } else {
            $requestData['noTabungan'] = null;
            $requestData['kelurahan'] = null;
        }

        $user = User::create($requestData);
        alert()->success('New User Created!');

        if ($request->role == 'nasabah') {
            $wallet = new Saldo;
            $wallet->jumlah_saldo = 0;
            $wallet->id_user = $user->id;
            $wallet->save();
        }
        return redirect('admin/user');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $data['user'] = $user;
        return view('admin.user.edit', $data);
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
        $currentUser = User::find($id);

        if ($currentUser->email !== $request->email) {

            $existingUser = User::where('email', $request->email)
                ->whereRaw('email <> ?', $currentUser->email)->first();


            if ($existingUser) {
                alert()->error('User with this email is already exisit');
                return redirect()->back();
            }
        }

        if ($currentUser->nomorHp !== $request->nomorHp) {

            $existingnomorHp = User::where('nomorHp', $request->nomorHp)
                ->whereRaw('nomorHp <> ?', $currentUser->nomorHp)->first();


            if ($existingnomorHp) {
                alert()->error('User with this nomorHp is already exisit');
                return redirect()->back();
            }
        }

        if ($currentUser->nik !== $request->nik) {

            $existingnik = User::where('nik', $request->nik)
                ->whereRaw('nik <> ?', $currentUser->nik)->first();


            if ($existingnik) {
                alert()->error('User with this NIK is already exisit');
                return redirect()->back();
            }
        }


        $requestData = $request->all();
        if ($request->password != null) {
            $requestData['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);
        alert()->success('Record Updated!');
        unset($requestData['password']);
        $user->update($requestData);

        return redirect('admin/user');
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
        User::destroy($id);

        return redirect('admin/user');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }
}
