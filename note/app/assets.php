<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assets extends Model
{
    protected $table = 'assets';
    public function product(){
        return $this->belongsTo('App\product','id_product','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
