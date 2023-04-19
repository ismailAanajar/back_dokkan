<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use RealRashid\SweetAlert\Facades\Alert;

class Auth extends Controller
{
    public function index () 
    {
        return view('auth.login');
    }

    public function login (Request $request) {
        $credentials = $request->only(['email', 'password']);
        
        if (FacadesAuth::guard('admin')->attempt($credentials, $request->remember) ) {
            return redirect()->route('admin.index');
        }

        Alert::error('error', 'User not found!!');
        return redirect()->back();

    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('login');
    }
}