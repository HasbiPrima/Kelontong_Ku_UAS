<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alamat;

class AlamatController extends Controller
{
    public function index()
    {
        $table = Alamat::all();

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
        // $table = Alamat::create([
        //     "name" => $request->name,
        //     "gender" => $request->gender,
        //     "age" => $request->age
        // ]);

        $table = new Alamat();
        $table->provinsi = $request->provinsi;
        $table->kabupaten = $request->kabupaten;
        $table->kecamatan = $request->kecamatan;
        $table->alamat_lengkap = $request->alamat_lengkap;
        $table->tambahan = $request->tambahan;
        $table->kode_pos = $request->kode_pos;
        $table->nama_penerima = $request->nama_penerima;
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
        $table = Alamat::find($id);
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
        $table = Alamat::find($id);
        if($table){
            $table->provinsi = $request->provinsi ? $request-> provinsi : $table->provinsi;
            $table->kabupaten = $request->kabupaten ? $request->kabupaten : $table->kabupaten;
            $table->kecamatan = $request->kecamatan ? $request->kecamatan : $table->kecamatan;
            $table->alamat_lengkap = $request->alamat_lengkap ? $request->alamat_lengkap : $table->alamat_lengkap;
            $table->tambahan = $request->tambahan ? $request->tambahan : $table->tambahan;
            $table->kode_pos = $request->kode_pos ? $request->kode_pos : $table->kode_pos;
            $table->nama_penerima = $request->nama_penerima ? $request->nama_penerima : $table->nama_penerima;
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
        $table = Alamat::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete succes"];
        }else{
            return["message" => "Data not found"];
        }
    }
}
