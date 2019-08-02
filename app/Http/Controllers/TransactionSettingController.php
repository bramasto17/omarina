<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Models\Transaction;
use App\Models\DetailTransaction;

class TransactionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $AllTransaction = Transaction::orderBy('updated_at','desc')
                                      ->get();
        return response()->json($AllTransaction);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
        $Transaction =  DB::table('Transaction')
                        ->leftJoin('Confirmation', 'Transaction.TransactionID', '=', 'Confirmation.TransactionID')
                        ->where('Status',$status)
                        ->orderBy('updated_at','desc')
                        ->select('Transaction.TransactionID', 
                            'Status',
                            'CustomerName',
                            'CustomerEmail',
                            'Phone',
                            'Address',
                            'City',
                            'Province',
                            'Postcode',
                            'Delivery',
                            'GrandTotal',
                            'created_at',
                            'BankTo',
                            'BankFrom',
                            'SenderAccount',
                            'AccountName')
                        ->get();
        // $Transaction = Transaction::where('Status','=',$status)
        //                 ->orderBy('updated_at','desc')
        //                 ->get()
        return response()->json($Transaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($TransactionID)
    {
        //
        $DetailTransaction =  DB::table('DetailTransaction')
                        ->where('TransactionID',$TransactionID)
                        ->join('Item', 'DetailTransaction.ItemID', '=', 'Item.ItemID')
                        ->select('DetailTransaction.*', 'Item.ItemName')
                        ->get();
        return response()->json($DetailTransaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $TransactionID)
    {
        //
        $update = Transaction::find(Request::input('TransactionID'));
        $update->Status = Request::input('Status');
        
        if(Request::input('GrandTotal') && Request::input('Delivery')){
            $update->GrandTotal  = Request::input('GrandTotal');
            $update->Delivery = Request::input('Delivery');    
        }
        $update->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($TransactionID)
    {
        //
        $delete = Transaction::find($TransactionID);
        $delete->delete();
    }
}
