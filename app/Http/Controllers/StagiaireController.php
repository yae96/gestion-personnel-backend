<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StagiaireController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Stagiaire::all();
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
        $stagiaire=new stagiaire;
        if($request->nom!=null)
        $stagiaire->nom=$request->nom;
        if($request->email!=null)
        $stagiaire->email=$request->email;
        if($request->password!=null)
        $stagiaire->password=Hash::make($request->password);
        if($request->date_naissance!=null)
        $stagiaire->date_naissance=$request->date_naissance;
        if($request->adresse!=null)
        $stagiaire->adresse=$request->adresse;
        if($request->acces!=null)
        $stagiaire->acces=$request->acces;
        if($request->archive!=null)
        $stagiaire->archive=$request->archive;
        if($request->avatar!=null)
        $stagiaire->avatar=$request->avatar;
        if($request->telephone!=null)
        $stagiaire->telephone=$request->telephone;
        if($request->cv_fichier!=null)
        $stagiaire->cv_fichier=$request->cv_fichier;
        $stagiaire->save();
        return $stagiaire;
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
        return Stagiaire::find($id);
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
        $stagiaire=Stagiaire::find($id);
        if($request->nom!=null)
        $stagiaire->nom=$request->nom;
        if($request->email!=null)
        $stagiaire->email=$request->email;
        if($request->password!=null)
        $stagiaire->password=Hash::make($request->password);
        if($request->date_naissance!=null)
        $stagiaire->date_naissance=$request->date_naissance;
        if($request->adresse!=null)
        $stagiaire->adresse=$request->adresse;
        if($request->acces!=null)
        $stagiaire->acces=$request->acces;
        if($request->archive!=null)
        $stagiaire->archive=$request->archive;
        if($request->avatar!=null)
        $stagiaire->avatar=$request->avatar;
        if($request->telephone!=null)
        $stagiaire->telephone=$request->telephone;
        if($request->cv_fichier!=null)
        $stagiaire->cv_fichier=$request->cv_fichier;
        $stagiaire->save();
        return $stagiaire;
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
        return Stagiaire::destroy($id);
    }
    public function stage(){
        $stagiaire_id=auth()->user('stagiaire')->id;
        $stagiaire=Stagiaire::find($stagiaire_id);
        $stage_id=$stagiaire->stage_id;
        $stages=Stage::all()->where('stage_id',$stage_id);
        return $stages;
    }
    public function getName($id){
        $stagiaire=Stagiaire::find($id);
        return $stagiaire->nom;
    }
}
