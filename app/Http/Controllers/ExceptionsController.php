<?php

namespace App\Http\Controllers;

use App\Models\Exceptions;
use Illuminate\Http\Request;

class ExceptionsController extends Controller
{
    public function index()
    {
        try{
            return response()->json(Exceptions::all(),200);
            
        }catch(\Exception $exception){
            return response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'GET','code'=>'404'],404);
        }     
    }

    public function show($id)
    {
        try{
            $Exceptions= Exceptions::findOrFail($id);
            return response()->json($Exceptions,200);            
        }catch(\Exception $exception){            
            return response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'GET','code'=>'404'],404);
        }
    }
    public function store(Request $request)
    {
        try{
            $Exceptions=Exceptions::create($request->all());
            return response()->json(['message'=>'Created Successful','classException'=>'','method'=>'POST','code'=>'201'],201);
        }catch(\Exception $exception){
            return response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'POST','code'=>'400'],400);
        }  
    }
    public function update(Request $request,$id)
    {
        try{
            $Exceptions=Exceptions::find($id);
            $Exceptions->update($request->all());
            return response()->json(['message'=>'Updated Successful','classException'=>'','method'=>'PUT','code'=>'200'],200);
        }catch(\Exception $exception){
            return response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'PUT','code'=>'404'],404);
        } 
    }
    public function destroy($id)
    {
        try{
            $Exceptions=Exceptions::find($id);
            $Exceptions->delete();
            return response()->json(['message'=>'Deleted Successful','classException'=>'','method'=>'DELETE','code'=>'204'],204);
        }catch(\Exception $exception){
            return response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'DELETE','code'=>'404'],404);
        } 
    }
}
