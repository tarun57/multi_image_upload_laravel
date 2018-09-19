<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use DB;

class UploadController extends Controller
{
public function index(request $request) {
	 $this->validate($request,[
            'name'=>'required',
			 'image' => 'required',
            ]);

    $input=$request->all();
    $image=array();
    if($files=$request->file('image')){
        foreach($files as $file){
             $name=$file->getClientOriginalName();
            // $file->move('image',$name);
            $image[]=$name;
        }
    }
       
		// Detail::insert( [
  //       'image'=>  implode("|",$image),
  //       'name' =>$input['name'],
  //       //you can put other insertion here
  //   ]);


   return view('admin.multi');
}

}

