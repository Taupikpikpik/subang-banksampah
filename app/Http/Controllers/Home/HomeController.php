<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Models\BankSampah;
use App\Models\KategoriSampah;
use App\Models\PenjualanSampah;
use App\Models\PenjualanSampahDetail;
use App\Models\PembelianSampah;
use App\Models\PembelianSampahDetail;
use App\Models\JadwalPengambilan;
use App\Models\TransaksiSampah;
use App\Models\Saldo;
use App\Models\PenarikanSaldo;
use App\Models\Jadwal;
use Alert;
use App\Mail\kirimEmail;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        $data['saldo'] = Saldo::where('id_user', Auth::id())->first();
        $data['penjualan'] = DB::table('penjualan_sampah_details')->selectRaw('sum(kuantitas) as kuantitas')->join('penjualan_sampahs', 'penjualan_sampahs.id', '=', 'penjualan_sampah_details.id_penjualan_sampah')->where('status_penjualan', 'Penjualan Berhasil')->where('id_nasabah', Auth::id())->first()->kuantitas;
        $data['kategori'] = KategoriSampah::get();
        $data['bank'] = BankSampah::get();
        return view('home.index', $data);
    }

    public function indexPetugas()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        $data['jadwal'] = JadwalPengambilan::where('id_petugas', Auth::id())->count('id');
        $data['kategori'] = KategoriSampah::get();
        $data['bank'] = BankSampah::where('status_sampah', "active")->get();
        return view('home.index-petugas', $data);
    }

    public function indexPengepul()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        $data['pembelian'] = DB::table('pembelian_sampah_details')->selectRaw('sum(kuantitas) as kuantitas')->join('pembelian_sampahs', 'pembelian_sampahs.id', '=', 'pembelian_sampah_details.id_pembelian_sampah')->where('status_pembelian', 'Pembelian Berhasil')->where('id_pengepul', Auth::id())->first()->kuantitas;
        $data['kategori'] = KategoriSampah::get();
        $data['sampah'] = BankSampah::where('status_sampah', "active")->get();
        return view('home.index-pengepul', $data);
    }

    public function purchase()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        $data['pembelian'] = PembelianSampah::with('detail')->where('id_pengepul', Auth::id())->get();

        return view('home.purchase', $data);
    }

    public function detailPembelian($id)
    {
        $sampah = PembelianSampahDetail::with('sampah')->with('pembelian_sampah')->where('id_pembelian_sampah', $id)->get();

        return response()->json([
            'data' => $sampah
        ]);
    }

    public function storePurchase(Request $request)
    {

        $code = chr(rand(65, 90)); // Uppercase letter (A-Z)
        $code .= rand(10, 99); // Two random numbers (10-99)
        $code .= chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)); // Three uppercase letters (A-Z)

        $data_detail = [];

        $insert_sampah = PembelianSampah::create([
            'id_pengepul' => Auth::id(),
            'status_pembelian' => 'Menunggu Pengambilan Di Bank Sampah',
            'kode_pembelian' => $code,
        ]);

        foreach ($request->id_sampah as $key => $value) {
            $sampah = BankSampah::find($request->id_sampah[$key]);
            $data_detail[] = [
                'id_sampah' => $request->id_sampah[$key],
                'kuantitas' => $request->kuantitas[$key],
                'total' => $sampah->harga_jual * $request->kuantitas[$key],
                'id_pembelian_sampah' => $insert_sampah->id,
            ];
            $sampah = BankSampah::find($request->id_sampah[$key]);
            $sampah->stok -= $request->kuantitas[$key];
            $sampah->save();
        }

        $detail =  PembelianSampahDetail::insert($data_detail);

        $transaksi = new TransaksiSampah;
        $transaksi->id_sampah = '';
        $transaksi->kuantitas = '';
        $transaksi->id_jualbeli = $insert_sampah->id;
        $transaksi->tanggal_transaksi = date('Y-m-d');
        $transaksi->jenis_transaksi = 'Pembelian';
        $transaksi->save();

        alert()->success('Request Pembelian Berhasil, Silahkan Datang ke Bank Sampah');
        return redirect('pengepul');
    }

    public function profile()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        return view('home.profile');
    }

    public function profileUpdate($id, Request $request)
    {
        $requestData = $request->all();
        if ($request->password != null) {
            $requestData['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);
        unset($requestData['password']);
        $user->update($requestData);
        alert()->success('Profil Berhasil Diperbaharui');

        return redirect('profile');
    }

    public function withdraw()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        if (isset($_GET['start_date'])) {
            $data['withdraw'] = PenarikanSaldo::whereBetween('updated_at', [$_GET['start_date'], $_GET['end_date']])->where('id_nasabah', Auth::id())->orderBy('created_at', 'desc')->get();
            $limit['wd'] = PenarikanSaldo::whereBetween('updated_at', [$_GET['start_date'], $_GET['end_date']])->where('id_nasabah', Auth::id())->where('status', "Menunggu Penukaran Kode")->orWhere('status', "Penarikan Diproses")->exists();
        } else {
            $data['withdraw'] = PenarikanSaldo::where('id_nasabah', Auth::id())->orderBy('created_at', 'desc')->get();
            $limit['wd'] = PenarikanSaldo::where('id_nasabah', Auth::id())->where('status', "Menunggu Penukaran Kode")->orWhere('status', "Penarikan Diproses")->exists();
        }
        return view('home.withdraw', $data, $limit);
    }

    public function createWithdraw()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        $data['saldo'] = Saldo::where('id_user', Auth::id())->first();

        return view('home.create-withdraw', $data);
    }

    public function storeWithdraw(Request $request)
    {
        $code = chr(rand(65, 90)); // Uppercase letter (A-Z)
        $code .= rand(10, 99); // Two random numbers (10-99)
        $code .= chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)); // Three uppercase letters (A-Z)

        $withdraw = new PenarikanSaldo;
        $withdraw->id_nasabah = Auth::id();
        $withdraw->id_saldo = $request->id_saldo;
        $withdraw->jumlah = $request->jumlah_penarikan;
        $withdraw->kode = $code;
        $withdraw->status = 'Penarikan Diproses';
        $withdraw->save();

        alert()->success('Request Penarikan Berhasil');
        return redirect('/');
    }

    public function sell()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        if (isset($_GET['start_date'])) {
            $data['penjualan'] = PenjualanSampah::whereBetween('updated_at', [$_GET['start_date'], $_GET['end_date']])->where('id_nasabah', Auth::id())->orderBy('id', 'desc')->get();
            $limit['penjualans'] = PenjualanSampah::whereBetween('updated_at', [$_GET['start_date'], $_GET['end_date']])->where('id_nasabah', Auth::id())->where(function ($query) {
                $query->where('status_penjualan', 'Menunggu Konfirmasi Admin')
                    ->orWhere('status_penjualan', 'Menunggu Kedatangan Petugas');
            })->exists();
        } else {
            $data['penjualan'] = PenjualanSampah::where('id_nasabah', Auth::id())->orderBy('id', 'desc')->get();
            $limit['penjualans'] = PenjualanSampah::where('id_nasabah', Auth::id())->where(function ($query) {
                $query->where('status_penjualan', 'Menunggu Konfirmasi Admin')
                    ->orWhere('status_penjualan', 'Menunggu Kedatangan Petugas');
            })->exists();
        }

        return view('home.sell', $data, $limit);
    }

    public function detailPenjualan($id)
    {
        $sampah = PenjualanSampahDetail::with('sampah')->with('penjualan_sampah')->where('id_penjualan_sampah', $id)->get();

        return response()->json([
            'data' => $sampah
        ]);
    }

    public function jadwalNasabah($id)
    {


        if (isset($_GET['date'])) {
            $data['jadwal'] = JadwalPengambilan::with('petugas')->join('penjualan_sampahs', 'penjualan_sampahs.id', 'jadwal_pengambilan.id_penjualan')
                ->select('penjualan_sampahs.id_nasabah', 'jadwal_pengambilan.*')
                ->where('penjualan_sampahs.id_nasabah', Auth::id())
                ->where('tanggal', "Like", "%" . $_GET['date'] . "%")
                ->orderBy('tanggal', 'desc')
                ->get();
        } else {
            $data['jadwal'] = JadwalPengambilan::with('petugas')->join('penjualan_sampahs', 'penjualan_sampahs.id', 'jadwal_pengambilan.id_penjualan')
                ->select('penjualan_sampahs.id_nasabah', 'jadwal_pengambilan.*')
                ->where('penjualan_sampahs.id_nasabah', Auth::id())
                ->orderBy('tanggal', 'desc')
                ->get();
        }
        $id_penjualan = $id;
        $petugas = User::where('role', 'petugas')->get();
        $nasabah = Auth::user();
        $jadwals = Jadwal::where('id_user', $nasabah->id)->first();
        return view('home.jadwal-nasabah', $data, compact('petugas', 'nasabah', 'jadwals', 'id_penjualan'));
    }

    public function updateJadwal($id)
    {


        $jam_end = date('H:i:s', strtotime('+1 hour', strtotime(request('jam'))));
        // Create a new schedule
        $jadwal = new Jadwal();
        $jadwal->id_user = Auth::user()->id; // Assuming 'user_id' is the column in the 'jadwals' table
        $jadwal->id_penjualan = $id;
        $jadwal->hari = request('hari');
        $jadwal->jam_start = request('jam');
        $jadwal->jam_end = $jam_end;
        $jadwal->save();
        return redirect('/');
    }
    public function jadwalPetugas()
    {
        // $data['jadwal'] = JadwalPengambilan::with('petugas')->join('penjualan_sampahs', 'penjualan_sampahs.id', 'jadwal_pengambilan.id_penjualan')
        //     ->select('penjualan_sampahs.id_nasabah', 'jadwal_pengambilan.*')
        //     ->where('jadwal_pengambilan.id_petugas', Auth::id())->get();
        $data['sampahs'] = DB::table('bank_sampahs')->get();
        $data['jadwal'] = Jadwal::with('petugas', 'penjualan')->where('id_petugas', Auth::id())->get();
        $data['detail'] = PenjualanSampahDetail::all();

        return view('home.jadwal-petugas', $data);
    }

    public function petugasApprove($id)
    {
        $jadwal = Jadwal::find($id);
        $penjualan = PenjualanSampah::find($jadwal->id_penjualan);
        $penjualan->status_penjualan = 'Penjualan Berhasil';
        $penjualan->save();

        $total_penjualan = 0;
        $penjualan = PenjualanSampahDetail::where('id_penjualan_sampah', $jadwal->id_penjualan)->get();
        foreach ($penjualan as $value) {
            $total_penjualan += $value->total;

            $sampah = BankSampah::find($value->id_sampah);
            $sampah->stok += $value->kuantitas;
            $sampah->save();
        }

        $penjualan = PenjualanSampah::find($jadwal->id_penjualan);
        $penjualan->status_penjualan = 'Penjualan Berhasil';
        $penjualan->save();

        $detail = PenjualanSampahDetail::where('id', Request()->input('detail_id'))->first();
        $detail->kuantitas = Request()->input('kuantitas');
        $detail->total = Request()->input('total');
        $detail->save();

        $saldoAdmin = Saldo::find(1);
        $saldoAdmin->jumlah_saldo -= $penjualan->total;
        $saldoAdmin->save();

        $saldoNasabah = Saldo::where('id_user', $penjualan->id_nasabah)->first();
        $saldoNasabah->jumlah_saldo += $total_penjualan;
        $saldoNasabah->save();

        alert()->success('Pengambilan Barang Penjualan Berhasil');
        // dd($detail->kuantitas);
        return redirect('/petugas');
    }

    public function createSell()
    {
        if (Auth::id() == null) {
            return view('home.login');
        }
        $data['sampah'] = BankSampah::where('status_sampah', "active")->get();


        $data['kategori'] = BankSampah::with('kategori')->where('status_sampah', "active")->groupBy('id_kategori_sampah')->get();


        return view('home.create-sell', $data);
    }

    public function storeSell(Request $request)
    {

        $data_detail = [];
        $getData = PenjualanSampah::where('status_penjualan', 'Menunggu Konfirmasi Admin')->where('id_nasabah', Auth::id())->count();

        // if ($getData > 0) {
        //     alert()->error('Ada request penjualan yang belum diproses');
        //     return redirect('/sell/create');
        // }

        // dd($request);
        $insert_sampah = PenjualanSampah::create([
            'id_nasabah' => Auth::id(),
            'status_penjualan' => 'Menunggu Konfirmasi Admin',
        ]);
        foreach ($request->sampah as $key => $value) {
            $data_detail[] = [
                'id_sampah' => $request->sampah[$key],
                'kuantitas' => $request->kuantitas[$key],
                'total' => $request->total[$key],
                'id_penjualan_sampah' => $insert_sampah->id,
            ];
        }
        $detail =  PenjualanSampahDetail::insert($data_detail);


        $transaksi = new TransaksiSampah;
        $transaksi->id_sampah = $data_detail[0]['id_sampah'];
        $transaksi->kuantitas = $data_detail[0]['kuantitas'];
        $transaksi->id_jualbeli = $insert_sampah->id;
        $transaksi->tanggal_transaksi = date('Y-m-d');
        $transaksi->jenis_transaksi = 'Penjualan';
        $transaksi->save();

        alert()->success('Request Penjualan Berhasil');
        $cekdata = DB::table('penjualan_sampahs')->where('id_nasabah', Auth::user()->id)->orderBy('id', 'DESC')->first();

        return redirect()->route('jadwal', $cekdata->id);
    }

    public function getSampahDetail($id)
    {
        $sampah = BankSampah::find($id);

        return response()->json([
            'harga_beli' => $sampah->harga_beli
        ]);
    }

    public function getDataSampah($id)
    {
        $sampah = BankSampah::where('id_kategori_sampah', $id)->get();

        $datasampah = [];
        if ($sampah) {
            foreach ($sampah as $s) {

                $data_sampah[] = [
                    'id' => $s->id,
                    'nama_sampah' => $s->nama_sampah,
                ];
            }
        }
        return response()->json($data_sampah);
    }

    public function registerPage()
    {
        return view('home.register');
    }

    public function userRegisterSubmit(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            alert()->error('Account already exist');
            return redirect()->back();
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = 'nasabah';
            $user->password = bcrypt($request->password);
            $user->save();

            $wallet = new Saldo;
            $wallet->jumlah_saldo = 0;
            $wallet->id_user = $user->id;
            $wallet->save();
            alert()->success('Account Created Successfuly');
            return redirect('user-login');
        }
    }

    public function loginPage()
    {
        return view('home.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $email = $request->get('email');
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $email)->first();

        if ($user->status == 'deactive') {
            alert()->error('Akun anda berstatus non-aktif');
            return redirect('/');
        }
        if (auth()->guard('web')->attempt($credentials) && $user->role == 'nasabah') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            // alert()->success('Login Success');
            return redirect('/');
        } else if (auth()->guard('web')->attempt($credentials) && $user->role == 'pengepul') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            // alert()->success('Login Success');
            return redirect('/pengepul');
        } else if (auth()->guard('web')->attempt($credentials) && $user->role == 'petugas') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            // alert()->success('Login Success');
            return redirect('/petugas');
        } else if (auth()->guard('web')->attempt($credentials) && $user->role == 'admin') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            alert()->success('Login Success');
            return redirect('/admin');
        } else if (auth()->guard('web')->attempt($credentials) && $user->role == 'reviewer') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            alert()->success('Login Success');
            return redirect('/reviewer');
        } else {
            alert()->error('Wrong email or password!');
            return redirect('/user-login');
        }
    }

    public function userLogout()
    {
        session()->flush();
        Auth::logout();
        return redirect('/user-login');
    }

    public function lupaPassword()
    {
        return view('home.lupaPassword');
    }

    public function prosesLupaPassword()
    {
        $email = Request()->email;

        $data = DB::table('users')->where('email', $email)->first();

        if ($data) {

            $data_email = [
                'subject'       => 'Lupa Password',
                'sender_name'   => 'boomichael34@gmail.com',
                'urlUtama'      => 'http://127.0.0.1:8000',
                'tipe'          => 'Lupa Password',
                'urlReset'      => 'http://127.0.0.1:8000/reset_password/' . $data->id,
                'dataUser'      => $data,
            ];

            Mail::to($data->email)->send(new kirimEmail($data_email));
            alert()->success('Cek Email Anda');
            return redirect('/pengepul');
        } else {
            alert()->error('Gagal Kirim Email');
            return back();
        }
    }

    public function resetPassword($id)
    {

        $data = [
            'user' => DB::table('users')->where('id', $id)->first()
        ];

        return view('home.resetPassword', $data);
    }

    public function prosesResetPassword($id)
    {
        Request()->validate([
            'password' => 'min:6|required|confirmed',
            'password_confirmation' => 'min:6|required',
        ], [
            'password.required'    => 'Password baru harus diisi!',
            'password.min'         => 'Password baru minimal 6 karakter!',
            'password.confirmed'   => 'Password baru tidak sama!',
            'password_confirmation.required'    => 'Konfimrasi Password harus diisi!',
            'password_confirmation.min'         => 'Konfimrasi Password minimal 6 karakter!',
        ]);

        $data = [
            'id'       => $id,
            'password' => Hash::make(Request()->password)
        ];

        DB::table('users')->where('id', $id)->update($data);
        alert()->success('Silahkan login');
        return redirect('/pengepul');
    }
}
