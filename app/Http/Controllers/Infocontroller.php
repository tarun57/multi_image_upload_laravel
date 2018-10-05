<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use Auth;
use DB;

class Infocontroller extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = info::all();
        $image = array();
        return view('admin.user.show',compact('infos','image'));  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (Auth::user()->can('infos.create')) {
            
            $infos =info::all();
            return view('admin.user.user',compact('infos'));
        // }
        return redirect(route('admin.index'));
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
            'email' => 'required',
            'password' => 'required',
           
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

        $infos = new info;
    $infos->image=  implode(",",$image);
        $infos->name = $request->name;
        $infos->email = $request->email;
        $infos->password = $request->password;
      
       
        $infos->save();
      

        return redirect(route('info.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // if (Auth::user()->can('infos.update')) {
       //      $infos = info::with('info')->where('id',$id)->first();
           
            $infos =info::all();
             
            return view('admin.user.edit',compact('infos'));
        // }
        return redirect(route('admin.index'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
       
        // $data = array();
        // $data['name'] = $request->name;
        // DB::table('infos')->where('id',$request->id)->update($data);
     $this->validate($request,[
             'name'=>'required',
             'email' => 'required',
             'password' => 'required',
            
    //         // 'image' => 'required',
            ]);
        // if ($request->hasFile('image')) {
        //     $imageName = $request->image->store('public');
        // }else{
        //     return 'No';
        // }
     //     $image=array();
     //     if($files=$request->file('image')){
     //     foreach($files as $file){
     //          $name=$file->getClientOriginalName();
     //          $file->move('image',$name);
     //         $image[]=$name;
     //     }
     // }
     $infos = info::find($id);
        // // $infos->image=  implode(",",$image);
        // // $infos->image = $imageName;
         $infos->name = $request->name;
         $infos->email = $request->email;
         $infos->password = $request->password;
      
       
         $infos->save();
        return redirect(route('info.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      info::where('id',$id)->delete();
        return redirect()->back();
    }
}
