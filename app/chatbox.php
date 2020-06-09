<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatbox extends Model
{
    protected $table = 'chatbox';
    public function user(){
        return $this->belongsTo('App\User','id_user_chat','id');
    }
}
