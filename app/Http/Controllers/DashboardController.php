<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
class DashboardController extends Controller
{
public function deleteimg(Request $req){
   $uploads=Upload::find($req['upload_id']);
   $images=json_decode($uploads['image']);
   unset($images[$images]);
   $uploads['image']=json_encode(array_values('$images'));
   $uploads->save();
   return redirect()->back();
}
}
		