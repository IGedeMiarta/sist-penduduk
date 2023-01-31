<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        $data['title'] = 'Login';
        return view('auth.login',$data);
    }
    public function authicated(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('username',$request->username)->first();
        // dd($user);
        if(!$user){
            return redirect()->back()->with('error','Login Failed, User Not Found');
        }
        // if(Hash::check($request->password,$user->password)){
        //     return redirect()->back()->with('error','Login Failed, Wrong Password');
        // }
        if($user->role == 1){
            $role= 'admin';
        }else{
            $role = 'user';
        }
        if(Auth::attempt($request->only('username','password'))){
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success','Selamat Datang Kembali');
        }
        return redirect()->back()->with('error',"Login Gagal !");
    }
    public function register(){
        $data['title'] = 'Register';
        return view('auth.register',$data);
    }
    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'username'  => 'required',
            'password'  => 'required|confirmed|min:6',
            'password_confirmation'=>'required'
        ]);
        try {
            User::create([
                'username' => $request->username,
                'nama'     => ucwords($request->name),
                'password' => Hash::make($request->password),
                'role'     => 1 
            ]);
            return redirect()->intended('/login')->with('success','User Created');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Failed: '.$th->getMessage());
        }
    }
     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
