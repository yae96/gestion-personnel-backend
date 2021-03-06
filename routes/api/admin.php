<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttestationController;
use App\Http\Controllers\AvanceController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\SystemeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|*/
Route::group(['prefix' => 'admin'],function(){

//unauthenticated routes for admins here  
Route::get('/avatar/{name}',[FileController::class, 'avatarDownload']);
Route::get('/cv/{name}',[FileController::class, 'cvDownload']);
Route::apiResource('attestations',AttestationController::class);
Route::group( ['middleware' => ['auth:admin','scope:admin'] ],function(){
       // authenticated admin routes here 
    Route::apiResource('admins',AdminController::class);
    Route::get('/signout',[LoginController::class, 'logout']);
    Route::apiResource('stagiaires',StagiaireController::class);
    Route::apiResource('employes',EmployeController::class);             
    Route::apiResource('stages',StageController::class);
  
    Route::apiResource('gestions',GestionController::class);
    Route::apiResource('conges',CongeController::class);
    Route::apiResource('paiements',PaiementController::class);
    Route::apiResource('avances',AvanceController::class);
    Route::apiResource('systemes',SystemeController::class);
    Route::apiResource('documents',DocumentController::class);
    Route::apiResource('postes',PosteController::class);
    Route::get('/employename/{id}',[EmployeController::class, 'getName']);
    Route::get('/stagiairename/{id}',[StagiaireController::class, 'getName']);
    Route::post('/avatar',[FileController::class, 'avatarUpload']);
    Route::post('/cv',[FileController::class, 'cvUpload']);
    Route::delete('/avatar/{name}',[FileController::class, 'avatarDelete']);
    Route::get('/test', function()
{
return 'Admin';
});
    });
});