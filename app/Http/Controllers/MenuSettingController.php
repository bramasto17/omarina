<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;

class MenuSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response()->json([], 400);
        return response()->json(Item::where('ActiveStatus','=','Active')->get());
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
        
        Item::create(array(
            'ItemName' => Request::input('ItemName'),
            'SmallPrice' => Request::input('SmallPrice'),
            'RegularPrice' => Request::input('RegularPrice'),
            'Description' => Request::input('Description'),
            'Picture' => Request::input('Picture'),
            'ActiveStatus' => "Active"
        ));
        //return response()->json(Request::all());
        return response()->json(array("success"=>true));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ItemID)
    {
        //
        return response()->json(
                Property::where('ItemID','=',$ItemID)->get()
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = array(
            'ItemID'    => 'required',
            'ItemName'  => 'required',
            'SmallPrice'  => 'required | numeric',
            'RegularPrice'  => 'required | numeric',
            'Description' => 'required',
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            //return response()->json(array("success"=>false));
            return Request::all();
        } else {
            $updateItem = Item::find(Request::input('ItemID'));
            $updateItem->ItemName  = Request::input('ItemName');
            $updateItem->SmallPrice = Request::input('SmallPrice');
            $updateItem->RegularPrice = Request::input('RegularPrice');
            $updateItem->Description = Request::input('Description');
            if(Request::input('Picture')){
                //delete previous file from folder
              $updateItem->Picture = Request::input('Picture');  
            }
            
            $updateItem->save();


            // redirect
            return response()->json(array("success"=>true));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ItemID)
    {
        //
        $updateItem = Item::find($ItemID);
        $updateItem->ActiveStatus = "Deleted";
        $updateItem->save();
    }

    public function upload()
    {
        dd(Request);
        if(Request::hasFile('files')){
            $file       = Request::file('files');
            $ItemName = Request::input('ItemName');
            $fileName   = $file->getClientOriginalName();
            $file->move("Assets/img/product/".$ItemName."/", $fileName);
            return response()->json(array("success"=>true,"ItemName"=>$ItemName));
        }else{
            return response()->json(array("success"=>false));    
        }
 
    }
}
