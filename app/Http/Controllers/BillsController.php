<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    public function index()
    {
        try{
            $Bills=Bills::join('clients','bills.cliente','=','clients.id')
            ->select('bills.id','bills.bill_number','bills.total','bills.company','clients.name as client')
            ->get();
            return response()->json($Bills,200);
            
        }catch(\Exception $exception){
            $response= response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'GET','code'=>'404'],404);
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
            $Bills= Bills::findOrFail($id);
            return response()->json($Bills,200);            
        }catch(\Exception $exception){            
            $response= response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'GET','code'=>'404'],404);
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
            $Bills=Bills::create($request->all());
            return response()->json(['message'=>'Created Successful','classException'=>'','method'=>'POST','code'=>'201'],201);
        }catch(\Exception $exception){
            $response= response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'POST','code'=>'400'],400);
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
            $Bills=Bills::find($id);
            $Bills->update($request->all());
            return response()->json(['message'=>'Updated Successful','classException'=>'','method'=>'PUT','code'=>'200'],200);
        }catch(\Exception $exception){
            $response= response()->json(['message'=>$exception->getMessage(),'classException'=>get_class($exception),'method'=>'PUT','code'=>'404'],404);
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
            $Bills=Bills::find($id);
            $Bills->delete();
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
