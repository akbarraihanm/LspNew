<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Produk;
use App\Pengguna;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(!Session::get('loginAdmin')){
          return redirect('/admin/login');
        }
        else{
          $produk = Produk::all();

          if($produk){
            return view('admin',['produk'=>$produk]);
          }
        }
    }

    public function managePengguna(){
      $user = Pengguna::all();
      if($user){
        return view('kustomer',['user'=>$user]);
      }
    }

    public function createPengguna(){
      return view('addkus');
    }

    public function addPengguna(Request $request){
      $this->validate($request,[
        'username'=>'required|unique:penggunas',
        'password'=>'required',
        'nama'=>'required'
      ]);

      if(Pengguna::create($request->all())){
        return redirect('/admin/manageuser');
      }
    }

    public function editPengguna($id){
      $user = Pengguna::find($id);
      if($user){
        return view('editkus',['user'=>$user]);
      }
    }

    public function updatePengguna(Request $request, $id){
      $user = Pengguna::find($id);
      if($user){
        $user->update($request->all());
        return redirect('/admin/manageuser');
      }
    }

    public function deletePengguna($id){
      $user = Pengguna::find($id);
      if($user){
        $user->delete();
        return redirect('/admin/manageuser');
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
        return view('adminadd');
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
        $this->validate($request, [
          'nama'=>'required',
          'harga'=>'required'
        ]);

        if(Produk::create($request->all())){
          return redirect('/admin/home');
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

    public function login(){
      return view('adminlogin');
    }

    public function loginPost(Request $request){
      $username = $request->username;
      $password = $request->password;

      $admin = Admin::where('username',$username)->where('password',$password)->first();

      if(@count($admin) > 0){
        Session::put('adminUsername',$admin->username);
        Session::put('loginAdmin',TRUE);
        return redirect('/admin/home');
      }
      else{
        return redirect('/admin/login');
      }
    }

    public function logout(){
      Session::flush();
      return redirect('/admin/login');
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
        $produk = Produk::find($id);
        if($produk){
          return view('adminedit',['produk'=>$produk]);
        }
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
        $produk = Produk::find($id);
        if($produk){
          $produk->update($request->all());
          return redirect('/admin/home');
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
        //
        $produk = Produk::find($id);
        if($produk){
          $produk->delete();
          return redirect('/admin/home');
        }
    }
}
