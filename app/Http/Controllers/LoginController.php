<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employe;
use App\Models\Stagiaire;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Validator;

class LoginController extends Controller
{
public function signIn(Request $request)
{
    $email = $request->email;
    $password = $request->password;

    $rules = [
        'email' => 'required|email:rfc,dns|max:255',
        'password' => ['required'],
    ];

   // $validator = Validator::make($request->all(), $rules,$this->validationMessages());

    //if ($validator->fails()) {return  response()->json(["message" => $validator->errors()->first()],400);}
$message=response( array( "message" => "Wrong Credentials." ), 400 );
    if(Stagiaire::where('email',$email)->count() > 0 ){

    $Stagiaire = Stagiaire::where('email',$email)->first();

    if(password_verify($password,$Stagiaire->password)){
        //$customer->last_login = Carbon::now();
        //$customer->save();
        //$token = $customer->createToken('Laravel Password Grant Client')->accessToken;
        return response( array( "message" => "Sign In Successful", "data" => [
            "Stagiaire" => $Stagiaire,
            
            // Below the customer key passed as the second parameter sets the role
            // anyone with the auth token would have only customer access rights
            "token" => $Stagiaire->createToken('Personal Access Token',['stagiaire'])->accessToken
        ]  ), 200 );
    } else {
        return $message;
    }
}
elseif(Admin::where('email',$email)->count() > 0 ){

    $admin = Admin::where('email',$email)->first();

    if(password_verify($password,$admin->password)){
        //$customer->last_login = Carbon::now();
        //$customer->save();
        //$token = $customer->createToken('Laravel Password Grant Client')->accessToken;
        return response( array( "message" => "Sign In Successful", "data" => [
            "admin" => $admin,
            
            // Below the customer key passed as the second parameter sets the role
            // anyone with the auth token would have only customer access rights
            "token" => $admin->createToken('Personal Access Token',['admin'])->accessToken
        ]  ), 200 );
    } else {
        return $message;
    }}
    elseif(Employe::where('email',$email)->count() > 0 ){

        $employe = Employe::where('email',$email)->first();
    
        if(password_verify($password,$employe->password)){
            //$customer->last_login = Carbon::now();
            //$customer->save();
            //$token = $customer->createToken('Laravel Password Grant Client')->accessToken;
            return response( array( "message" => "Sign In Successful", "data" => [
                "employe" => $employe,
                
                // Below the customer key passed as the second parameter sets the role
                // anyone with the auth token would have only customer access rights
                "token" => $employe->createToken('Personal Access Token',['employe'])->accessToken
            ]  ), 200 );
        } else {
            return $message;
        }}
        else{
            return $message;
        }

}
public function logout()
{
    if(Auth::guard('employe')->check()) {
        Auth::guard('employe')->user()->AauthAcessToken()->delete();
     }
     elseif(Auth::guard('stagiaire')->check()) {
        //$this->guard('stagiaire')->logout();
        $this->user('stagiaire')->AauthAcessToken()->delete();
     }
    return response()->json([
        'msg' => 'Logged out complete'
    ]);
}
}