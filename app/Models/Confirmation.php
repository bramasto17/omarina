<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    //
    protected $fillable = array('TransactionID','BankTo','BankFrom','SenderAccount','AccountName');
    protected $primaryKey = null; // or null
    public $incrementing = false;
    protected $table = 'Confirmation';
    public $timestamps = false;
}
