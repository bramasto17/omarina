<?php

namespace App\Http\Controllers;

use App\Models\Confirmation;
use App\Models\Transaction;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $findTransaction = Transaction::find(Request::input('TransactionID'));
        if($findTransaction){
            Confirmation::create(array(
                'TransactionID' => Request::input('TransactionID'),
                'BankTo' => Request::input('BankFrom'),
                'BankFrom' => Request::input('BankFrom'),
                'SenderAccount' => Request::input('SenderAccount'),
                'AccountName' => Request::input('AccountName')
            ));
            return response()->json(array("success"=>true));    
        }else{
            return response()->json([], 404);
        }
        
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
