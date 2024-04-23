<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importa la clase Storage
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\URL;
use App\Models\indexModel;
use Intervention\Image\ImageManagerStatic as Image;


class indexController extends Controller
{
    public function fc_index(Request $request){
       
   
        return view('indexView',["variable"=>'']);
    }
  

}