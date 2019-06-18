<?php

namespace App\Http\Controllers;
use App\Keranjang;
use App\Produk;
use App\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $iduser = Session::get('id');
        $keranjang = Keranjang::join('produks','keranjangs.idProduk','produks.id')
        ->select('keranjangs.*','produks.nama','produks.harga')
        ->where('idPengguna',$iduser)->get();

        if($keranjang){

          return view('keranjang',['list'=>$keranjang]);
        }
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
        //
        $this->validate($request,[
          'idPengguna'=>'required',
          'idProduk'=>'required',
          'jumlah_barang'=>'required',
          'total_harga'=>'required'
        ]);

        $keranjang = Keranjang::create([
          'idPengguna'=>$request->idPengguna,
          'idProduk'=>$request->idProduk,
          'jumlah_barang'=>$request->jumlah_barang,
          'total_harga'=>($request->total_harga)*($request->jumlah_barang),
        ]);
        if($keranjang){
          return redirect('/user/belanja');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $keranjang = Keranjang::find($id);
        if($keranjang){
          $keranjang->delete();
          return redirect('/user/keranjang');
        }
    }
}
