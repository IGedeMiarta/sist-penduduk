<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data['title'] = 'User Detail';
        $data['user']  = User::all();
        return view('user.user',$data);
    }
    public function addUser(Request $request){
        $request->validate([
            'nama' => 'required',
            'username'  => 'required',
            'password'  => 'required|confirmed|min:6',
            'role'=>'required',
        ]);
        try {
            User::create([
                'username' => $request->username,
                'nama'     => ucwords($request->nama),
                'password' => Hash::make($request->password),
                'role'     => $request->role
            ]);
            return redirect()->back()->with('success','User Created');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Failed: '.$th->getMessage());
        }
    }
    public function update(Request $request){
        $request->validate([
            'nama1' => 'required',
            'username1'  => 'required',
        ]);
        if ($request->password1 !== $request->password_confirmation1) {
            dd($request->all());
            return redirect()->back()->with('error','Password Not Match');
        }
        $user = Auth::user();
        try {
            $user->nama = $request->nama1;
            $user->username = $request->username1;
            $user->password = Hash::make($request->password1);
            $user->save();
            return redirect()->back()->with('success','User Updated');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Failed: '.$th->getMessage());
        }
    }
}
