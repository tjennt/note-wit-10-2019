<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\chatbox;
class chatbox_controller extends Controller
{
    public function get_chatbox(){
        if(Auth::check()){
            $data = chatbox::all();
            return view('chat-box.chatbox',['data'=>$data]);
        }else{
            return redirect('home/login');
        }
        
    }
    public function fetch_data(Request $request){
        if($request->ajax()){ 
            if(Auth::check()){
                $data = chatbox::orderBy('id','desc')->paginate(5);
                return view('chat-box.chat_content', compact('data'))->render();
            }else{
                return view('error.404');
            } 
        }else{
            return view('error.404');
        }
    }
    public function post_chatbox(Request $request){
        if(Auth::check()){
            if($request->ajax()){
                $id_user = Auth::user()->id;
                $cash_now = Auth::user()->cash;
                $content = $request->content;
                $data1 = new chatbox();
                $data1->content = $content;
                $data1->id_user_chat = $id_user;
                $data1->save(); 
                $cash = User::find($id_user);
                $cash->cash = $cash_now + 50;
                $cash->save();
            }else{
                return view('error.404');
            }  
        }else{
            return view('error.404');
        }
    }
    public function delete_chat($id_chat){
        echo 'he';
    }
}