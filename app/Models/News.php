<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = array('Title', 'Content');
    protected $primaryKey = 'NewsID'; // or null
    protected $table = 'News';
    //public $incrementing = false;
}
