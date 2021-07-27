<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
    public function avatarUpload(Request $request){
        $avatar=$request->file('avatar')->store('avatars');
        return $request->file('avatar')->hashName();
    }
    public function avatarDownload($name){
        $path = storage_path('app/avatars/'.$name);
        return response()->download($path, $name);
    }
    public function cvUpload(Request $request){
        $avatar=$request->file('cv_file')->store('/cv');
        return $request->file('cv_file')->hashName();
    }
    public function cvDownload($name){
        $path = storage_path('app/cv/'.$name);
        return response()->download($path, $name);
    }
    public function x($path){
        File::delete('/app/avatar/'.$path);
    }
    public function avatarDelete($name)
    {  
     // if(Storage::exists(storage_path('app/avatar/'.$name))){
        Storage::delete(storage_path('app/avatar/'.$name));
        return 'good';
    
    }

}
