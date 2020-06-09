<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    protected $table = 'follow';
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
        return $this->belongsTo('App\User','id_user_follow','id');
    }
}
