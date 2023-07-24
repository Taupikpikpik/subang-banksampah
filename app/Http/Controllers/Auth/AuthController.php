<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Alert;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginpage() {
        return view('auth.login');
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
            
        ]);   
        $email = $req->get('email');
        $credentials = $req->only('email', 'password');
        $user = User::where('email', $email)->first();
        dd($user);
        if (auth()->guard('web')->attempt($credentials) && $user->role == 'admin') {
            session(["email" => $email]);
            Alert::success('Login Success'
        );
            return redirect('/admin');
        } 
        else if (auth()->guard('web')->attempt($credentials) && $user->role == 'dosen') {
            session(["email" => $email]);
            Alert::success('Login Success');
            return redirect('/dosen');

        }
        else if (auth()->guard('web')->attempt($credentials) && $user->role == 'reviewer') {
            dd('s');
            session(["email" => $email]);
            Alert::success('Login Success');
            return redirect('/reviewer');

        } else {
            Alert::error('Email atau ' . 'Password'. ' Salah!' );
            return redirect('/');
        }
    }

    public function registerPage() {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->child_name = $request->child_name;
        $user->child_age = $request->child_age;
        $user->email = $request->email;
        $user->role = 'User';
        $user->is_verified = 1;
        $user->password = bcrypt($request->password);
        $user->save();
        Alert::success('Akun ' . 'Berhasil'. ' Dibuat!' );
        return redirect('/login-user');
    }

    public function userLogout() {
        session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
