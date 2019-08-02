<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    //
    protected $fillable = array('TransactionID','ItemID','Type','Size','Package','ItemPrice','Quantity','TotalPrice');
    protected $primaryKey = null; // or null
    public $incrementing = false;
    protected $table = 'DetailTransaction';
    public $timestamps = false;
}
