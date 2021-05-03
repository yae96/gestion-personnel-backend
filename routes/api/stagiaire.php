<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\DocumentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|*/

Route::group(['prefix' => 'employe'],function(){

   //Route::post('sign-up','CustomerController@signUp');
//unauthenticated routes for customers here  

Route::group( ['middleware' => ['auth:employe','scope:employe'] ],function(){
      // authenticated customer routes here 
      Route::get('/attestations',[AttestationController::class, 'stagiaire']);
      Route::get('/logout',[LoginController::class, 'logout']);
      Route::get('/stage',[AttestationController::class, 'stage']);
      Route::apiResource('documents',DocumentController::class);
      Route::apiResource('stagiaires',StagiaireController::class)->only(['show','update']);            
      Route::apiResource('stages',StageController::class)->only(['show']);
      Route::apiResource('attestations',AttestationController::class)->only(['store','update']);
   });
});