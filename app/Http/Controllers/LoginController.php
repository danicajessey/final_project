<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;


class LoginController extends Controller
{
    public function login(){
        $login = login::all();
        return view('login', compact('login'));
    }
    public function store(Request $request){
        $request->validate([
            'nama'=>'required|string|between:5,80',
            'role'=>'required|string'
        ]);

        login::create([
            'nama'=>$request->nama,
            'role'=>$request->role,
        ]);
        return redirect(route('show'));
    }
}
