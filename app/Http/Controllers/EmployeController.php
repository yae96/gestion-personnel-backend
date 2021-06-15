<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Employe::all();
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
        /*if($request->get('file'))
        {
           $image = $request->get('file');
           $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
           \Image::make($request->get('file'))->save(public_path('images/').$name);
         }*/
         $fields = $request->validate([
            'nom' => 'required|string',
            'email' => 'required|string|unique:admins|unique:employes|unique:stagiaires,email',
            'password' => 'required|string'
        ]);
        $employe=new employe;
        if($request->nom!=null)
        $employe->nom=$request->nom;
        if($request->email!=null)
        $employe->email=$request->email;
        if($request->password!=null)
        $employe->password=Hash::make($request->password);
        if($request->date_naissance!=null)
        $employe->date_naissance=$request->date_naissance;
        if($request->adresse!=null)
        $employe->adresse=$request->adresse;
        if($request->acces!=null)
        $employe->acces=$request->acces;
        if($request->archive!=null)
        $employe->archive=$request->archive;
        if($request->avatar!=null)
        $employe->avatar=$request->avatar;
        if($request->telephone!=null)
        $employe->telephone=$request->telephone;
        if($request->cv_fichier!=null)
        $employe->cv_fichier=$request->cv_fichier;
        $employe->save();
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
        return Employe::find($id);
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
        $employe=Employe::find($id);
        if($request->nom!=null)
        $employe->nom=$request->nom;
        if($request->email!=null)
        $employe->email=$request->email;
        if($request->password!=null)
        $employe->password=Hash::make($request->password);
        if($request->date_naissance!=null)
        $employe->date_naissance=$request->date_naissance;
        if($request->adresse!=null)
        $employe->adresse=$request->adresse;
        if($request->acces!=null)
        $employe->acces=$request->acces;
        if($request->archive!=null)
        $employe->archive=$request->archive;
        if($request->avatar!=null)
        $employe->avatar=$request->avatar;
        if($request->telephone!=null)
        $employe->telephone=$request->telephone;
        if($request->cv_fichier!=null)
        $employe->cv_fichier=$request->cv_fichier;
        $employe->save();
        return $employe;
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
        return Employe::destroy($id);
    }
    public function getName($id){
        $employe=Employe::find($id);
        return $employe->nom;
    }
}
