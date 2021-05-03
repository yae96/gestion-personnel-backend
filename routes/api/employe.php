<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\AvanceController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PosteController;
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

//unauthenticated routes for customers here  

Route::group( ['middleware' => ['auth:employe','scope:employe'] ],function(){
      // authenticated customer routes here 
   Route::get('/attestation',[AttestationController::class, 'employe']);
   Route::get('/l',[LoginController::class, 'logout']);
   Route::get('/conges',[CongeController::class, 'employe']);
   Route::get('/avances',[AvanceController::class, 'employe']);
   Route::get('/paiements',[PaiementController::class, 'employe']);
   Route::get('/postes',[PosteController::class, 'employe']);
   Route::apiResource('employes',EmployeController::class)->only(['show','update']);             
   Route::apiResource('attestations',AttestationController::class)->only(['store','update']);
   Route::apiResource('conges',CongeController::class)->only(['store','update']);
   Route::apiResource('paiements',PaiementController::class)->only(['store','update']);
   Route::apiResource('avances',AvanceController::class)->only(['store','update']);
   Route::apiResource('documents',DocumentController::class);
   Route::apiResource('postes',PosteController::class)->only(['show']);
   });
});