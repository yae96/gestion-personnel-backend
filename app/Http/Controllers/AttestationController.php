<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Attestation::all();
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
        return Attestation::create($request->all());
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
        return Attestation::find($id);
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
        $attestation=Attestation::find($id);
        $attestation->update($request->all());
        return $attestation;
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
        Attestation::destroy($id);
    }
    public function employe(){
        $employe_id=auth()->user('employe')->id;
        $attestaions=Attestation::where('employe_id',$employe_id)->get();
        return $attestaions;
    }
    public function stagiaire(){
        $stagiaire_id=auth()->user('stagiaire')->id;
        $attestaions=Attestation::all()->where('stagiaire_id',$stagiaire_id);
        return $attestaions;
    }
}
