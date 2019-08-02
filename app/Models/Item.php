<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = array('ItemName','SmallPrice','RegularPrice','Description','Picture','ActiveStatus');
    protected $primaryKey = 'ItemID'; // or null
    protected $table = 'Item';
    public $timestamps = false;
}
