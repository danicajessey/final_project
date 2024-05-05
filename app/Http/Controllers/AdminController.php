<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\kategori;

class AdminController extends Controller
{
    public function show(){
        $admin = admin::all();
        return view('welcome', compact('admin'));
    }
    public function create(){
        $kategoris=kategori::all();
        return view('create', compact('kategoris'));
    }
    public function store2(Request $request){
        $request->validate([
            'nama'=>'required|string|between:5,80',
            'harga'=>'required|integer',
            'qty'=>'required|integer',
            'image'=>'required|mimes:png,jpg'
        ]);

        $fileName= $request->name.'-'. $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/image', $fileName);
        admin::create([
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'qty'=>$request->qty,
            'image'=>$fileName,
            'kategori_id'=>$request->kategori_name
        ]);
        return redirect(route('show'));
    }
    public function edit($id){
        $admin=admin::findOrFail($id);
        $kategoris=kategori::all();
        return view('edit', compact('kategoris'), compact('admin'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'nama'=>'required|string|between:5,80',
            'harga'=>'required|integer',
            'qty'=>'required|integer',
            'image'=>'required|mimes:png,jpg'
        ]);
        $admin=admin::findOrFail($id);
        $admin->update([
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'qty'=>$request->qty,
            'kategori_id'=>$request->kategori_name
        ]);
        return redirect(route('show'));
    }
    public function edit2($id){
        $admin=admin::findOrFail($id);
        return view('edit2', compact('admin'));
    }
    public function update2(Request $request, $id){
        $admin=admin::findOrFail($id);
        $request->validate([
            'image'=>'required|mimes:png,jpg'
        ]);
        $fileName=$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/image', $fileName);
        $admin->update([
            'image'=>$fileName
        ]);
        return redirect(route('show'));
    }
    public function delete($id){
        admin::destroy($id);
        return redirect(route('show'));
    }
}
