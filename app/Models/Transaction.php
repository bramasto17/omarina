<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = array('TransactionID','Status','CustomerName','CustomerEmail','Phone','Address','City','Province','Postcode','Delivery','GrandTotal');
    protected $primaryKey = 'TransactionID'; // or null
    public $incrementing = false;
    protected $table = 'Transaction';
}
