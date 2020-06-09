<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\note;
use App\note_bin;
use App\user;
class note_controller extends Controller
{
    public function site404(){
        return view('error.404');
    }
    public function get_redirect_note(){
        if(Auth::check()){
            $user = Auth::user()->username;
            return view('home.redirect-note')->with('user',$user);
        }else{
            return redirect('home/login');
        }
    }
    //List note
    public function get_note(){
        if(Auth::check()){
            $user = Auth::user()->username;
            $id_user = Auth::user()->id;
            $data = note::where('id_user',$id_user)->orderBy('id','desc')->paginate(5);
            $data1 = note::where('id_user', $id_user)->first();
            if($data1){
                return view('home.note',['data'=>$data])->with('user',$user);
            }else{
                return view('home.note-empty')->with('user',$user);
            }
            
        }else{
            return redirect('home/login');
        }  
    }
    public function fetch_data(Request $request){
        if($request->ajax()){ 
            $id_user = Auth::user()->id;
            if(Auth::check()){
                $data = note::where('id_user',$id_user)->orderBy('id','desc')->paginate(5);
                return view('home.note-content', compact('data'))->render();
            }else{
                return view('error.404');
            } 
        }else{
            return view('error.404');
        }
    }
    //Detail note
    public function get_detail($id_note){
        if(Auth::check()){
             $user = Auth::user()->username;
            $id_user = Auth::user()->id;
            $data1 = note::where('id',$id_note)->first();
            if($data1){
              if($data1->id_user == $id_user){ 
                    $data = note::where('id',$id_note)->get();          
                    return view('home.detail',['data'=>$data])->with('user', $user);
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
    //Create note
    public function create_note(){
        if(Auth::check()){
            return view('home.new_note');
        }else{
            return redirect('home/login');
        }
        
    }
    public function create_post_note(Request $request){
        $title = $request->title;
        $content = $request->content;
        $short_content = $request->short_content;
        $id_user = Auth::user()->id;
        $cash_now = Auth::user()->cash;
        // dd($cash_now);
        $note = new note();
        $note->title = $title;
        $note->content = $content;
        $note->short_content = $short_content;
        $note->id_user = $id_user;
        $note->like = 0;
        $note->save();
        $cash = User::find($id_user);
        $cash->cash = $cash_now + 10000;
        $cash->save();
        $danger = "Lưu nhật kí thành công";
        return redirect('home/create-note')->with('danger', $danger);
    }
    //Update note
    public function edit_note($id_note){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $data1 = note::where('id',$id_note)->first();
            if($data1){
                if($data1->id_user == $id_user){
                    $data = note::where('id',$id_note)->get();
                    return view('home.edit_note',['data'=>$data]);
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
    public function edit_post_note(Request $request){
        $id_note = $request->id_note;  
        $update_note = note::find($id_note);
        $update_note->title = $request->title;
        $update_note->short_content = $request->short_content;
        $update_note->content = $request->content;
        $update_note->save();
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    //Delete and backup in note bin 
    public function delete_note($id_note){
       
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $data1 = note::where('id',$id_note)->first();
            if($data1){
                if($data1->id_user == $id_user){
                    $note = note::where('id',$id_note)->first();
                    $title = $note->title;
                    $short_content = $note->short_content;
                    $content = $note->content;

                    $note_bin = new note_bin();
                    $note_bin->title = $title;
                    $note_bin->short_content = $short_content;
                    $note_bin->content = $content;
                    $note_bin->id_user_bin = $id_user;
                    $note_bin->save();

                    $delete_note = note::find($id_note);
                    $delete_note->delete();
                    return redirect('home/note')->with('danger', 'Xóa thành công');
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