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
            "nama" => 'Masukan Nama',
            "harga" => 'Masukan Harga',
            "jumlah" => 'Masukan Jumlah',
            "total_harga" => 'Masukan Total Harga',
            "total_uang" => 'Masukan Total Uang',      
            "uang_kembalian" => 'Masukan Uang Kembalian'

        ];
        $validasi = Validator::make($request->all(),[
            "nama" => "required",          
            "harga" => "required",
            "jumlah" => "required",
            "total_harga" => 'required',
            "total_uang" => 'required',
            "uang_kembalian" => 'required'

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
        //$table->nama = $request->nama;
        //$table->harga = $request->harga;
        //$table->jumlah = $request->jumlah;
        //$table->total_harga = $request->total_harga;
        //$table->total_uang = $request->total_uang;
        //$table->uang_kembalian = $request->uang_kembalian;
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
            $table->nama = $request->nama ? $request-> nama : $table->nama;
            $table->harga = $request->harga ? $request->harga : $table->harga;
            $table->jumlah = $request->jumlah ? $request->jumlah : $table->jumlah;
            $table->total_harga = $request->total_harga ? $request->total_harga : $table->total_harga;
            $table->total_uang = $request->total_uang ? $request->total_uang : $table->total_uang;
            $table->uang_kembalian = $request->uang_kembalian ? $request->uang_kembalian : $table->uang_kembalian;
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
