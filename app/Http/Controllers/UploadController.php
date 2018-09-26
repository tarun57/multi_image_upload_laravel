<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use Auth;
use View;
use File;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $uploads = upload::all();
    
        return view('admin.multi',compact('uploads'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            
            'image' => 'required',
            ]);
          $image=array();
        if($files=$request->file('image')){
        foreach($files as $file){
             $name=$file->getClientOriginalName(); 
            $file->move('image',$name); 
            $image[]=$name;
        }
    }
       // if ($request->hasFile('image')) {

       //      $imageName = $request->image->store('uploads');
       //  }

        $uploads = new upload;
       $uploads->image=  implode(",",$image);
     // $uploads->image = $request->image;
        $uploads->name = $request->name;    
        $uploads->save();
      

       return redirect(route('upload.index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $upload = upload::find($id);
        $uploads = $upload->toArray();
    return View::make('admin.multiedit', [
        'uploads' => $uploads
    ]);
    return redirect(route('admin.multi')); 
        //$uploads =upload::find($id);


  
         //  return view('admin.multiedit',compact('uploads'));
         //}
        //return redirect(route('admin.multi')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idate(format)
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
      {
    $this->validate($request,[
            'name'=>'required',
            'image' => 'required',
            ]);
        $image=array();
        if($files=$request->file('image')){
        foreach($files as $file){
             $name=$file->getClientOriginalName();
             $file->move('image',$name);
            $image[]=$name;
        }
    }
        $uploads = upload::find($id);
        $uploads->image=  implode(",",$image);
        // $infos->image = $imageName;
        $uploads->name = $request->name;
        $uploads->save();
        return redirect(route('upload.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //  public function destroy($id)
    // {

    //      upload::where('id',$id)->delete();
    //      return redirect()->back();
    //  }

  public function destroy($image) {
    $uploads = Upload::find($image);
    if(array_exists($image, $uploads['image']))
    $final_upload[] = $uploads['image'];
    //unlink(public_path("image/{$image}"))->delete();
    $image_path = public_path("image/{$image}");
    if (File::exists($image_path)) {
          File::delete($image_path);                             
         unlink($image_path)->delete();
     }
    // $uploads->delete();
     return redirect()->back();
    // $uploads = $uploads['image'];
      // unlink($uploads)->delete();
    // return redirect(route('admin.multi')); ->with('message','خبر موفقانه حذف  شد');
}
}