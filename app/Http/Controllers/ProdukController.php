<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\produk;

class ProdukController extends Controller
{
    public function index()
    {
        $table = Produk::all();

        //return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200);
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table = Produk::create([
        //     "name" => $request->name,
        //     "gender" => $request->gender,
        //     "age" => $request->age
        // ]);

        $table = new Produk();
        $table->nama_barang = $request->nama_barang;
        $table->merek = $request->merek;
        $table->deskripsi = $request->deskripsi;
        $table->ukuran = $request->ukuran;
        $table->harga = $request->harga;
        $table->jumlah = $request->jumlah;
        $table->stok = $request->stok;
        $table->save();

        //return $table
        return response()->json([
            "message" => "Store success",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Produk::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Produk::find($id);
        if($table){
            $table->nama_barang = $request->nama_barang ? $request-> nama_barang : $table->nama_barang;
            $table->merek = $request->merek ? $request->merek : $table->merek;
            $table->deskripsi = $request->deskripsi ? $request->deskripsi : $table->deskripsi;
            $table->ukuran = $request->ukuran ? $request->ukuran : $table->ukuran;
            $table->harga = $request->harga ? $request->harga : $table->harga;
            $table->jumlah = $request->jumlah ? $request->jumlah : $table->jumlah;
            $table->stok = $request->stok ? $request->stok : $table->stok;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Produk::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return["message" => "Data not found"];
        }
    }
}
