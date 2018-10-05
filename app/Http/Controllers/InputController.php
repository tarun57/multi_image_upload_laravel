<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Input;
class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputs = input::all();
        
         return view('admin.inputi',compact('inputs')); 
        // return view('admin.testing'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $id=$request->input('id');
         return "I am in";
         $inputs = new input();
        $inputs->id =$id;
       
        $inputs->save();
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
            'name' => 'required',
            'email'=> 'required',
            'password'=> 'required',
            ]);
        $inputs = new input();
        $inputs->name = $request->name;
        $inputs->email = $request->email;
        $inputs->password = $request->password;
        $inputs->save();
        return response()->json($inputs);
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
       // $inputs =input::all();
        $input =input::find($id);
           $inputs = $input->toArray();
             

    return View('admin.inpute', [
        'inputs' => $inputs
    ]);
            //return view('admin.inpute',compact('inputs'));
        // }
       // return redirect(route('admin.inputi'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
  

  
       echo $email=$request->input('email');
    
 $this->validate($request,[
          
             'email'=> 'required',
           
             ]);
       $inputs = input::find($id);
        // $inputs->name = $request->name;
         $inputs->email = $email;
         $inputs->save();
         return response()->json($inputs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
