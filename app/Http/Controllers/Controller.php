<?php
namespace App\Http\Controllers;

use App\Books;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getIndex(){
        return view("admin.Ajax");
    }

    public function saveOrUpdate(Request $request){
        $book = new Books;
         if($request->id){
             $book = Books::find($request->id);
         }
        $book->name = $request->name;
        $book->price = $request->price;
        $result = $book->saveOrFail();
        if($result){
            return response()->json(array('message'=>'Record successfully saved or updated'));
        }else{
            return response()->json(array('message'=>'Failed to saved or updated'));
        }
    }


    public function getList(){
        $books = Books::all();
        return response()->json(array('data' => $books));
    }

    public function deleteRecord(Request $request){
        $book = Books::find($request->id);
        $book->delete();
        return response()->json(array('message'=>'Record deleted successfully!'));
    }
}
