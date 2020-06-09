<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\note_bin;
use App\note;

class notebin_controller extends Controller
{
    public function get_notebin(){
        if(Auth::check()){
            $user = Auth::user()->username;
            $id_user = Auth::user()->id;
            $data = note_bin::where('id_user_bin', $id_user)->orderBy('id', 'desc')->paginate(6); 
            $data1 = note_bin::where('id_user_bin', $id_user)->first();
            if($data1){
                return view('home.note_bin',['data'=>$data])->with('user', $user); 
            }else{
                return view('home.note_bin-empty')->with('user',$user);
            } 
        }else{
            return redirect('home/login');
        }
    }
    public function fetch_data(Request $request){
        if($request->ajax()){
            if(Auth::check()){
                $id_user = Auth::user()->id;
                $data = note_bin::where('id_user_bin', $id_user)->orderBy('id', 'desc')->paginate(6); 
                return view('home.note_bin-content', compact('data'))->render();
            }else{
                return view('error.404');
            } 
        }else{
            return view('error.404');
        }
    }
    public function restore_note($id_note){
        $id_user = Auth::user()->id;
        $data1 = note_bin::where('id',$id_note)->first();
        if(Auth::check()){
            if($data1){
                if($data1->id_user_bin == $id_user){
                    $data = note_bin::where('id', $id_note)->first();
                    $title = $data->title;
                    $cotent = $data->content;
                    $short_content = $data->short_content;
                    $id_user = $data->id_user_bin;
                    $note = new note();
                    $note->title = $title;
                    $note->content = $cotent;
                    $note->short_content = $short_content;
                    $note->id_user = $id_user;
                    $note->like = 0;
                    $note->save();
                    $delete_bin = note_bin::find($id_note);
                    $delete_bin->delete();
                    return redirect('home/note-bin')->with('danger', 'Khôi phục nhật kí thành công!');
                }else{
                    return view('error.404');
                }
            }else{
                return view('error.404');
            }
        }else{
            return redirect('home/login');
        }
    }
    public function delete_notebin($id_note){
        $id_user = Auth::user()->id;
        $data1 = note_bin::where('id',$id_note)->first();
        if(Auth::check()){
            if($data1){
                if($data1->id_user_bin == $id_user){
                    $delete_bin = note_bin::find($id_note);
                    $delete_bin->delete();
                    return redirect('home/note-bin')->with('danger', 'Xóa thành công!');
                }else{
                    return view('error.404');
                }
            }else{
                return view('error.404');
            }
        }else{
            return redirect('home/login');
        }
    }
}
