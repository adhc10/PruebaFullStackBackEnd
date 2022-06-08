<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(Clients::all(),200);
            
        }catch(\Exception $exception){
            $response= response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'GET','code'=>'404']);
            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST', 'http://127.0.0.1:8000/api/exceptions');
            return response()->json([
                'status' => TRUE,
                'data' => $response
            ]);
        }     
    }

    public function show($id)
    {
        try{
            $clients= Clients::findOrFail($id);
            return response()->json($clients,200);            
        }catch(\Exception $exception){            
            $response=  response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'GET','code'=>'404'],404);
            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST', 'http://127.0.0.1:8000/api/exceptions');
            return response()->json([
                'status' => TRUE,
                'data' => $response
            ]);
        }
    }
    public function store(Request $request)
    {
        try{
            $clients=Clients::create($request->all());
            return response()->json(['message'=>'Created Successful','classException'=>'','method'=>'POST','code'=>'201'],201);
        }catch(\Exception $exception){
            $response=  response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'POST','code'=>'400'],400);
            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST', 'http://127.0.0.1:8000/api/exceptions');
            return response()->json([
                'status' => TRUE,
                'data' => $response
            ]);
        }  
    }
    public function update(Request $request,$id)
    {
        try{
            $clients=Clients::find($id);
            $clients->update($request->all());
            return response()->json(['message'=>'Updated Successful','classException'=>'','method'=>'PUT','code'=>'200'],200);
        }catch(\Exception $exception){
            $response=  response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'PUT','code'=>'404'],404);
            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST', 'http://127.0.0.1:8000/api/exceptions');
            return response()->json([
                'status' => TRUE,
                'data' => $response
            ]);
        } 
    }
    public function destroy($id)
    {
        try{
            $clients=Clients::find($id);
            $clients->delete();
            return response()->json(['message'=>'Deleted Successful','classException'=>'','method'=>'DELETE','code'=>'204'],204);
        }catch(\Exception $exception){
            $response= response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'DELETE','code'=>'404'],404);
            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST', 'http://127.0.0.1:8000/api/exceptions');
            return response()->json([
                'status' => TRUE,
                'data' => $response
            ]);
        } 
    }
}
