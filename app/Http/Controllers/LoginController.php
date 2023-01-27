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
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proses(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/admin/home');
        } else {
            return redirect('/')->with('failed', 'Email atau Password Salah !');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return view('login');
    }
}
