<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!Session::get('login')){
          return redirect('/login');
        }
        else
        return view('userhome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('daftar');
    }

    public function loginPage(){
      return view('login');
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
          'username'=>'required|unique:penggunas',
          'password'=>'required',
          'nama'=>'required'
        ]);

        if(Pengguna::create($request->all())){
          return redirect('/login');
        }
    }

    public function login(Request $request){
      $username = $request->username;
      $password = $request->password;

      $login = Pengguna::where('username',$username)->where('password',$password)->first();

      if(@count($login) > 0){
        Session::put('id',$login->id);
        Session::put('unameUser',$login->username);
        Session::put('nama',$login->nama);
        Session::put('login',TRUE);
        return redirect('/user/home');
      }
      else{
        return redirect('/login');
      }
    }

    public function logout(){
      Session::flush();
      return redirect('/login');
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
    }
}
