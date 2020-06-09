<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class note_bin extends Model
{
    protected $table = 'note_bin';
    public function user(){
        return $this->belongsTo('App\User','id_user_bin','id');
    }
}
