<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $guard = 'admin';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Admin::all();
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
        $fields = $request->validate([
            'nom' => 'required|string',
            'email' => 'required|string|unique:admins|unique:employes|unique:stagiaires,email',
            'password' => 'required|string'
        ]);
        $admin=new admin;
        if($request->nom!=null)
        $admin->nom=$request->nom;
        if($request->email!=null)
        $admin->email=$request->email;
        if($request->password!=null)
        $admin->password=Hash::make($request->password);
        if($request->date_naissance!=null)
        $admin->date_naissance=$request->date_naissance;
        if($request->adresse!=null)
        $admin->adresse=$request->adresse;
        if($request->avatar!=null)
        $admin->avatar=$request->avatar;
        if($request->telephone!=null)
        $admin->telephone=$request->telephone;
        $admin->save();
        return $admin;
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
        return Admin::find($id);

    }
     /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
public function find(){
    $admin= Admin::find(array('email'=>request('email'),'password'=>request('password')));
    return $admin;
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
        $admin=Admin::find($id);
        if($request->nom!=null)
        $admin->nom=$request->nom;
        if($request->email!=null)
        $admin->email=$request->email;
        if($request->password!=null)
        $admin->password=Hash::make($request->password);
        if($request->date_naissance!=null)
        $admin->date_naissance=$request->date_naissance;
        if($request->adresse!=null)
        $admin->adresse=$request->adresse;
        if($request->avatar!=null)
        $admin->avatar=$request->avatar;
        if($request->telephone!=null)
        $admin->telephone=$request->telephone;
        $admin->save();
        return $admin;
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
        Admin::destroy($id);
    }
    public function logout(){
        
    }
}
