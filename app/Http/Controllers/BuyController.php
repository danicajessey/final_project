<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buy;
use App\Models\kategori;

class BuyController extends Controller
{
    public function show(){
        $buy= buy::all();
        return view('welcome', compact('buy'));
    }
    public function create2(){
        $kategoris=kategori::all();
        return view('create2', compact('kategoris'));
    }

    public function store3(Request $request){
        $request->validate([
            'nama'=>'required|string|between:5,80',
            'harga'=>'required|integer',
            'qty'=>'required|integer',
            'image'=>'required|mimes:png,jpg'
        ]);

        $fileName= $request->name.'-'. $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/image', $fileName);
        buy::create([
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'qty'=>$request->qty,
            'image'=>$fileName,
            'kategori_id'=>$request->kategori_name
        ]);
        return redirect(route('show'));
    }
}
