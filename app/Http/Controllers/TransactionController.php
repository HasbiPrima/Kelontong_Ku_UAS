<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Transaction::all();

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
        $message = [
            "id_produk" => 'Masukan id_produk',
            "id_user" => 'Masukan id_user',
            "alamat" => 'Masukan alamat',
            "jumlah" => 'Masukan jumlah',
            "pembayaran" => 'Masukan pembayaran',      
            "total_harga" => 'Masukan Total Harga'

        ];
        $validasi = Validator::make($request->all(),[
            "id_produk" => "required",          
            "id_user" => "required",
            "alamat" => "required",
            "jumlah" => 'required',
            "pembayaran" => 'required',
            "total_harga" => 'required'

        ], $message);
        if ($validasi ->fails()) {
            return $validasi -> error();
        }
        $Transaction = Transaction::create($validasi->validate());
        $Transaction->save();

        return response()->json([
            "message"=>"load data success",
            "data"=> $Transaction
        ],201);

        //$table = new Transaction();
        //$table->id_produk = $request->id_produk;
        //$table->id_user = $request->id_user;
        //$table->alamat = $request->alamat;
        //$table->jumlah = $request->jumlah;
        //$table->pembayaran = $request->pembayaran;
        //$table->total_harga = $request->total_harga;
        //$table->save();

        //return $table
        //return response()->json([
        //    "message" => "Store success",
        //    "data" => $table
        //], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Transaction::find($id);
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
        $table = Transaction::find($id);
        if($table){
            $table->id_produk = $request->id_produk ? $request-> id_produk : $table->id_produk;
            $table->id_user = $request->id_user ? $request->id_user : $table->id_user;
            $table->alamat = $request->alamat ? $request->alamat : $table->alamat;
            $table->jumlah = $request->jumlah ? $request->jumlah : $table->jumlah;
            $table->pembayaran = $request->pembayaran ? $request->pembayaran : $table->pembayaran;
            $table->total_harga = $request->total_harga ? $request->total_harga : $table->total_harga;
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
        $table = Transaction::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return["message" => "Data not found"];
        }
    }
}
