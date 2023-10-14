<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request)
    {
        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/masyarakat_dashboard');
        } elseif (Auth::guard('petugas')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::guard('petugas')->user();
            if ($user->level == 'admin') {
                return redirect()->intended('/admin_dashboard');
            } elseif ($user->level == 'petugas') {
                return redirect('/petugas_dashboard');
            }
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
