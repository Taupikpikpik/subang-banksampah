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
use Alert;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        if(Auth::id() == null) {
            return view('home.login');
        }
        $data['saldo'] = Saldo::where('id_user', Auth::id())->first();
        $data['penjualan'] = DB::table('penjualan_sampah_details')->selectRaw('sum(kuantitas) as kuantitas')->join('penjualan_sampahs','penjualan_sampahs.id','=','penjualan_sampah_details.id_penjualan_sampah')->where('status_penjualan', 'Penjualan Berhasil')->where('id_nasabah', Auth::id())->first()->kuantitas;
        $data['kategori'] = KategoriSampah::get();
        $data['bank'] = BankSampah::get();
        return view('home.index', $data);
    }

    public function indexPetugas()
    {
        if(Auth::id() == null) {
            return view('home.login');
        }
        $data['jadwal'] = JadwalPengambilan::where('id_petugas', Auth::id())->count('id');
        $data['kategori'] = KategoriSampah::get();
        $data['bank'] = BankSampah::where('status_sampah', "active")->get();
        return view('home.index-petugas', $data);
    }

    public function indexPengepul()
    {
        if(Auth::id() == null) {
            return view('home.login');
        }
        $data['pembelian'] = DB::table('pembelian_sampah_details')->selectRaw('sum(kuantitas) as kuantitas')->join('pembelian_sampahs','pembelian_sampahs.id','=','pembelian_sampah_details.id_pembelian_sampah')->where('status_pembelian', 'Pembelian Berhasil')->where('id_pengepul', Auth::id())->first()->kuantitas;
        $data['kategori'] = KategoriSampah::get();
        $data['sampah'] = BankSampah::where('status_sampah', "active")->get();
        return view('home.index-pengepul', $data);
    }

    public function purchase() {
        if(Auth::id() == null) {
            return view('home.login');
        }
        $data['pembelian'] = PembelianSampah::with('detail')->where('id_pengepul', Auth::id())->get();
        
		return view('home.purchase', $data);
	}

    public function detailPembelian($id)
    {
        $sampah = PembelianSampahDetail::with('sampah')->with('pembelian_sampah')->where('id_pembelian_sampah',$id)->get();

        return response()->json([
            'data' => $sampah
        ]);
    }

    public function storePurchase(Request $request) {

        $code = chr(rand(65, 90)); // Uppercase letter (A-Z)
        $code .= rand(10, 99); // Two random numbers (10-99)
        $code .= chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)); // Three uppercase letters (A-Z)

        $data_detail = [];

        $insert_sampah = PembelianSampah::create([
            'id_pengepul' => Auth::id(),
            'status_pembelian' => 'Menunggu Pengambilan Di Bank Sampah',
            'kode_pembelian' => $code,
        ]);

        foreach($request->id_sampah as $key => $value){
            $sampah = BankSampah::find($request->id_sampah[$key]);
            $data_detail[] = [
                'id_sampah' => $request->id_sampah[$key],
                'kuantitas' => $request->kuantitas[$key],
                'total' => $sampah->harga_jual*$request->kuantitas[$key],
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

    public function profile() {
        if(Auth::id() == null) {
            return view('home.login');
        }
		return view('home.profile');
	}

    public function profileUpdate(Request $request) {
        $requestData = $request->all();
        if($request->password != null) {
            $requestData['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);
        unset($requestData['password']);
        $user->update($requestData);
        alert()->success('Profil Berhasil Diperbaharui');

        return redirect('profile');
	}

    public function withdraw() {
        if(Auth::id() == null) {
            return view('home.login');
        }
        $data['withdraw'] = PenarikanSaldo::where('id_nasabah', Auth::id())->get();
        $limit['wd'] = PenarikanSaldo::where('id_nasabah', Auth::id())->where('status', "Menunggu Penukaran Kode")->orWhere('status', "Penarikan Diproses")->exists();
		return view('home.withdraw', $data, $limit);
	}

    public function createWithdraw() {
        if(Auth::id() == null) {
            return view('home.login');
        }
        $data['saldo'] = Saldo::where('id_user', Auth::id())->first();

		return view('home.create-withdraw', $data);
	}

    public function storeWithdraw(Request $request) {
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
    public function sell() {
        if(Auth::id() == null) {
            return view('home.login');
        }
        $data['penjualan'] = PenjualanSampah::where('id_nasabah', Auth::id())->get();
        $limit['penjualans'] = PenjualanSampah::where('id_nasabah', Auth::id())->where('status_penjualan', "Menunggu Konfirmasi Admin")->orWhere('status_penjualan', "Menunggu Kedatangan Petugas")->exists();
		return view('home.sell', $data, $limit);
	}

    public function detailPenjualan($id)
    {
        $sampah = PenjualanSampahDetail::with('sampah')->with('penjualan_sampah')->where('id_penjualan_sampah',$id)->get();

        return response()->json([
            'data' => $sampah
        ]);
    }

    public function jadwalNasabah() {
        $data['jadwal'] = JadwalPengambilan::with('petugas')->
        join('penjualan_sampahs', 'penjualan_sampahs.id', 'jadwal_pengambilan.id_penjualan')
        ->select('penjualan_sampahs.id_nasabah', 'jadwal_pengambilan.*')
        ->where('penjualan_sampahs.id_nasabah', Auth::id())->get();
		return view('home.jadwal-nasabah', $data);
	}

    public function jadwalPetugas() {
        $data['jadwal'] = JadwalPengambilan::with('petugas')->
        join('penjualan_sampahs', 'penjualan_sampahs.id', 'jadwal_pengambilan.id_penjualan')
        ->select('penjualan_sampahs.id_nasabah', 'jadwal_pengambilan.*')
        ->where('jadwal_pengambilan.id_petugas', Auth::id())->get();
		return view('home.jadwal-petugas', $data);
	}

    public function petugasApprove($id) {
        $jadwal = JadwalPengambilan::find($id);
        $jadwal->status = 'Sampah Telah Diambil';
        $jadwal->save();
        
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
        
        
        $saldoAdmin = Saldo::find(1);
        $saldoAdmin->jumlah_saldo -= $penjualan->total;
        $saldoAdmin->save();

        $saldoNasabah = Saldo::where('id_user',$penjualan->id_nasabah)->first();
        $saldoNasabah->jumlah_saldo += $total_penjualan;
        $saldoNasabah->save();

        alert()->success('Pengambilan Barang Penjualan Berhasil');
        return redirect('/petugas');
    }

    public function createSell() {
        if(Auth::id() == null) {
            return view('home.login');
        }
        $data['sampah'] = BankSampah::where('status_sampah', "active")->get();

		return view('home.create-sell', $data);
	}

    public function storeSell(Request $request) {
        $data_detail = [];
        $getData = PenjualanSampah::where('status_penjualan','Menunggu Konfirmasi Admin')->where('id_nasabah', Auth::id())->count();
        
        if($getData > 0){
            alert()->error('Ada request penjualan yang belum diproses');
            return redirect('/sell/create');
        }

        $insert_sampah = PenjualanSampah::create([
            'id_nasabah' => Auth::id(),
            'status_penjualan' => 'Menunggu Konfirmasi Admin',
        ]);

        foreach($request->id_sampah as $key => $value){
            $data_detail[] = [
                'id_sampah' => $request->id_sampah[$key],
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
        return redirect('/');
    }

    public function getSampahDetail($id)
    {
        $sampah = BankSampah::find($id);

        return response()->json([
            'harga_beli' => $sampah->harga_beli
        ]);
    }
    public function registerPage() {
		return view('home.register');
	}

	public function userRegisterSubmit(Request $request) {
		$existingUser = User::where('email', $request->email)->first();
		if($existingUser) {
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

    public function loginPage() {
		return view('home.login');
	}

	public function userLogin(Request $request) {
		$request->validate([
            'email' => 'required',
            'password' => 'required',
            
        ]);   
        $email = $request->get('email');
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $email)->first();

        if($user->status == 'deactive') {
            alert()->error('Akun anda berstatus non-aktif');
            return redirect('/');
        }
        if (auth()->guard('web')->attempt($credentials) && $user->role == 'nasabah') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            // alert()->success('Login Success');
            return redirect('/');
        } 
        else if (auth()->guard('web')->attempt($credentials) && $user->role == 'pengepul') {
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
            alert()->error('Wrong email or password!' );
            return redirect('/user-login');
        }
	}

	public function userLogout() {
        session()->flush();
        Auth::logout();
        return redirect('/user-login');
    }


}