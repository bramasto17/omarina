<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use App\Models\Transaction;
use App\Models\DetailTransaction;
class OrderController extends Controller
{
    //
    public function SaveTransaction(Request $request)
    {
        Transaction::create(array(
            'TransactionID' => Request::input('TransactionID'),
            'Status' 		=> Request::input('Status'),
            'CustomerName' 	=> Request::input('CustomerName'),
            'CustomerEmail' => Request::input('CustomerEmail'),
            'Phone' 		=> Request::input('Phone'),
            'Address' 		=> Request::input('Address'),
            'City' 			=> Request::input('City'),
            'Province'	    => Request::input('Province'),
            'Postcode' 		=> Request::input('Postcode'),
            'Delivery'      => Request::input('Delivery'),
            'GrandTotal' 	=> Request::input('GrandTotal')
        ));
        //return response()->json(Request::all());
        return response()->json(array("success"=>true));
    }

    public function SaveDetailTransaction(Request $request)
    {
        $ArrayData = Request::input('ArrayData');
        for($i=0;$i<sizeof($ArrayData);$i++){
            DetailTransaction::create(array(
                 'TransactionID' => Request::input('ArrayData.'.$i.'.TransactionID'),
                 'ItemID' => Request::input('ArrayData.'.$i.'.ItemID'),
                 'Type' => Request::input('ArrayData.'.$i.'.Type'),
                 'Size' => Request::input('ArrayData.'.$i.'.Size'),
                 'Package' => Request::input('ArrayData.'.$i.'.Package'),
                 'ItemPrice' => Request::input('ArrayData.'.$i.'.ItemPrice'),
                 'Quantity' => Request::input('ArrayData.'.$i.'.Quantity'),
                 'TotalPrice' => Request::input('ArrayData.'.$i.'.TotalPrice')

             ));
        }
        return response()->json(array("success"=>true));
    }
}
