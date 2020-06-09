<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\note;
use App\chatbox;
use App\follow;
use DB;
use Auth;
class rank_controller extends Controller
{
    public function get_rank(){
        if(Auth::check()){
            $data = user::orderByDesc('cash')->take(10)->get();
            $data1 = note::
                 select('id_user', DB::raw('count(*) as total'))
                 ->groupBy('id_user')
                 ->orderByDesc('total')
                 ->take(10)
                 ->get();
            $data2 = chatbox::
                select('id_user_chat', DB::raw('count(*) as total'))
                ->groupBy('id_user_chat')
                ->orderByDesc('total')
                ->take(10)
                ->get();
            $data3 = follow::
                select('id_user', DB::raw('count(*) as total'))
                ->groupBy('id_user')
                ->orderByDesc('total')
                ->take(10)
                ->get();
            return view('rank.rank-select-all',['data'=>$data, 'data1'=>$data1, 'data2'=>$data2, 'data3'=>$data3]);
        }else{
            return redirect('home/login');
        }
        
    }
}
