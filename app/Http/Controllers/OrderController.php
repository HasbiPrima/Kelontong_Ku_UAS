<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $table = Order::all();

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
    //     // $table = Order::create([
    //     //     "name" => $request->name,
    //     //     "gender" => $request->gender,
    //     //     "age" => $request->age
    //     // ]);

        $table = new Order();
        $table->id_produk = $request->id_produk;
        $table->id_user = $request->id_user;
        $table->nama_barang = $request->nama_barang;
        $table->merek = $request->merek;
        $table->ukuran = $request->ukuran;
        $table->jumlah = $request->jumlah;
        $table->tambahan = $request->tambahan;
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
        $table = Order::find($id);
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
        $table = Order::find($id);
        if($table){
            $table->id_produk = $request->id_produk ? $request-> id_produk : $table->id_produk;
            $table->id_user = $request->id_user ? $request->id_user : $table->id_user;
            $table->nama_barang = $request->nama_barang ? $request->nama_barang : $table->nama_barang;
            $table->merek = $request->merek ? $request->merek : $table->merek;
            $table->ukuran = $request->ukuran ? $request->ukuran : $table->ukuran;
            $table->jumlah = $request->jumlah ? $request->jumlah : $table->jumlah;
            $table->tambahan = $request->tambahan ? $request->tambahan : $table->tambahan;
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
        $table = Order::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return["message" => "Data not found"];
        }
    }
}
