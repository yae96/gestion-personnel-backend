<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login',[LoginController::class, 'signIn'])->name('login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});
Route::get('/test', function()
{
return response()->json([
    'msg' => 'Logged out complete'
]);
});