<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class log_game extends Model
{
    protected $table = 'log_game';
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
