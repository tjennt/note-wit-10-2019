<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class admin_controller extends Controller
{
    public function get_cash(){
        if(Auth::check()){
            if(Auth::user()->level == 2 || Auth::user()->level == 3){
                return view('admin.give_money');
            }else{
                return view('error.404');
            }
        }else{
            return view('error.404');
        }
    }
    public function post_cash(Request $request){
        if(Auth::check()){
            if(Auth::user()->level == 2 || Auth::user()->level == 3){
                $user = $request->user;
                $id_user = User::where('username',$user)->first();
                $cash = user::find($id_user->id);
                $cash->cash = $id_user->cash + $request->give_cash;
                $cash->save();
                return redirect()->back()->with('danger', 'Nạp tiền thành công');
            }else{
                return view('error.404');
            }
        }else{
            return view('error.404');
        }
    }
}