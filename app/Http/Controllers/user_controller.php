<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Storage;
use Illuminate\Http\Responsecookie;
use Auth;
use App\User;
use App\note;
use App\chatbox;
use App\assets;
use App\product;
use App\follow;
use DB;
class user_controller extends Controller
{
    public function get_signup(){
        if(Auth::check()){
            $user = Auth::user()->username;
            return redirect('home/info/'.$user); 
        }else{
            return view('account.signup');
        }
        
    }
    public function post_signup(Request $request){
        if(Auth::check()){
            $user  = User::where('username', $request->username)->first();
            $username = $request->username;
            $password = $request->password;
            $password2 = $request->password2;
            if($user){
                return redirect()->back()->with('danger', 'Tên tài khoản đã tồn tại');
            }else{
                if($password != $password2){
                    return redirect()->back()->with('danger', 'Xác nhận mật khẩu không chính xác');
                }else{
                    $email = $request->email;
                    $user_new = new User();
                    $user_new->username = $username;
                    $user_new->password = bcrypt($password);
                    $user_new->email = $email;
                    $user_new->image = 'user.jpg';
                    $user_new->level = 1;
                    $user_new->cash = 1000;
                    $user_new->save();
                    $data = array('username'=>$username, 'email'=>$email);
                    Mail::send('mail.signup-mail', $data, function($message) use ($data){
                        $message->from('natriwit675111@gmail.com', 'notewit.info');
                        $message->to($data['email'])->subject('Signup successful | NoteWit.info');
                    });
                    return redirect()->back()->with('danger1', 'Đăng kí thành công');
                }
                
            }
        }else{
            return redirect('home/login');
        }
    }
    public function get_login(Request $request){
        
        if(Auth::check()){
            $user = Auth::user()->username;
            return redirect('home/info/'.$user);
        }else{
            $cookie_user = $request->cookie('user');
            $cookie_password = $request->cookie('password');
            return view('account.login')->with(['cookie_user'=>$cookie_user, 'cookie_password'=>$cookie_password]);
        }
       
    }
    public function post_login(Request $request){
        $username = $request->username;
        $password = $request->password;
        $remember = $request->remember;
        if(Auth::attempt(['username' => $username, 'password' => $password])){
            session()->put('user', $username);
            $id_user = Auth::User()->id;
            $update_time = User::find($id_user);
            $updated_at = Carbon::now();
            $update_time->updated_at = $updated_at;
            $update_time->save();
            if($remember){
                $user = Auth::user()->username;
                return redirect('home/info/'.$user)
                ->cookie(
                    'user', $user, 999*99
                )
                ->cookie(
                    'password', $password, 999*99
                );
            }else{
                $user = Auth::user()->username;
                return redirect('home/info/'.$user)
                ->cookie(
                    'user', '', 0
                )->cookie(
                    'password', '', 0
                );
            }           
            if(Auth::check()){
                return redirect('home/info/'.$user);
            }
        }else{
            $danger = "Tên đăng nhập hoặc mật khẩu không chính xác!";
            return redirect()->back()->with('danger',$danger);
        }
    }
    public function info(){
        if(Auth::check()){
            $user = Auth::user()->username;
            $data = User::where('username',$user)->get();
            return view('info-account.info',['data'=>$data])->with('user', $user);
        }else{
            return redirect('home/login');
        }
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            session()->forget('user');
            return redirect('home/login');
        }else{
            return redirect('erorr.404');
        }
    }
    public function update_info(Request $request){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            if($id_user){
                if ($request->file('image') != null){ 
                    $id_user = Auth::user()->id;
                    $username = Auth::user()->username;
                    $image_user = Auth::user()->image;
                    $file = $request->file('image');
                    $filetype = $file->getClientOriginalExtension('image');
                    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    $mp5_img = substr(str_shuffle($chars),0,10);
                    $filetype1 = strtolower($filetype);
                    if($filetype1 != 'jpg' && $filetype1 != 'png' && $filetype1 != 'jpeg' && $filetype1 != 'jpge' && $filetype1 != 'png-8' && $filetype1 != 'png-24'&& $filetype1 != 'hefi'){
                        return redirect()->back()->with('danger', 'Định dạng file ảnh không chính xác.');
                    }else{
                        if(Storage::exists('public/faces/' .$image_user)){
                            Storage::delete('public/faces/' .$image_user);
                            $filename = $username .$mp5_img .'.'.$filetype;
                            $file->move(base_path('storage/app/public/faces'),$filename);
                            $user = User::find($id_user);
                            $user->email = $request->email;
                            $user->name = $request->name;
                            $user->phone = $request->phone;
                            $user->image = $filename;
                            $user->info = $request->info;
                            $user->save();
                            return redirect()->back()->with('danger1', 'Cập nhật thông tin thành công.');  
                        }else{
                            $file = $request->file('image');
                            $filetype = $file->getClientOriginalExtension('image');
                            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                            $mp5_img = substr(str_shuffle($chars),0,10);
                            $filename = $username .$mp5_img .'.'.$filetype;
                            $file->move(base_path('storage/app/public/faces'),$filename);
                            $user = User::find($id_user);
                            $user->email = $request->email;
                            $user->name = $request->name;
                            $user->phone = $request->phone;
                            $user->image = $filename;
                            $user->info = $request->info;
                            $user->save();
                            return redirect()->back()->with('danger1', 'Cập nhật thông tin thành công.');  
                        }           
                    }     
                }else{
                    $id_user = Auth::user()->id;
                    $image = Auth::user()->image;
                    $user = User::find($id_user);
                    $user->email = $request->email;
                    $user->name = $request->name;
                    $user->phone = $request->phone;
                    $user->image = $image;
                    $user->info = $request->info;
                    $user->save();
                    return redirect()->back()->with('danger1', 'Cập nhật thông tin thành công.');
                }
            }else{
                return view('error.404');
            }
        }else{
            return view('error.404');
        }
    }
    public function get_fotgotinfo(){
        if(Auth::check()){
            $user = Auth::user()->username;
            return redirect('home/info/'.$user);
        }else{
            return view('account.forgotinfo');
        }
    }
    public function post_fotgotinfo(Request $request){
        $username = $request->username;
        $email = $request->email;
        $user = User::where('username', $username)->first();
        if($user){
            if($user->username == $username && $user->email == $email){
                $id_user = $user->id;
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $password = substr(str_shuffle($chars),0,13);
                $reset_pass = User::find($id_user);
                $reset_pass->password = bcrypt($password);
                $reset_pass->save();
                $data1 = User::where('id', $id_user)->first();
                $data = array('username'=>$data1->username,'password'=>$password, 'email'=>$email);
                Mail::send('mail.forgot-pass-mail', $data, function ($message) use ($data){
                    $message->from('natriwit675111@gmail.com','notewit.info');
                    $message->to($data['email'])->subject('Reset password | NoteWit.info');
                });
                return redirect()->back()->with('danger1','Vui lòng kiểm tra email để lấy lại mật khẩu của bạn!');
            }else{
                return redirect()->back()->with('danger','Sai tài khoản hoặc email!');
            }
        }else{
            return redirect()->back()->with('danger','Sai tài khoản hoặc email!');
        }
    }
    public function get_change(){
        if(Auth::check()){
            return view('account.change-pass');
        }else{
            return redirect('home/login');
        }
        
    }
    public function post_change(Request $request){
        $password = $request->password;
        $password1 = $request->password1;
        $password2 = $request->password2;
        if(Auth::check()){
            $password3 = Auth::User()->password;
            $id_user = Auth::User()->id;
            if(Hash::check($password, $password3)){
                if($password1 == $password2){
                    if($password == $password2){
                        return redirect()->back()->with('danger','Mật khẩu cũ giống mật khẩu mới!');
                    }else{
                        $change = User::find($id_user);
                        $change->password = bcrypt($password2);
                        $change->save();
                        $username = Auth::User()->username;
                        $email = Auth::User()->email;
                        $data = array('username'=>$username, 'email'=>$email);
                        Mail::send('mail.change-pass-mail', $data, function($message) use ($data){
                            $message->from('natriwit675111@gmail.com', 'notewit.info');
                            $message->to($data['email'])->subject('Change password | NoteWit.info');
                        });
                        session()->forget('user');
                        return redirect('home/login')->with('danger1','Đổi mật khẩu thành công, đăng nhập lại!');
                    }  
                }else{
                    return redirect()->back()->with('danger','Xác nhận mật khẩu thất bại!');
                }
            }else{
                return redirect()->back()->with('danger','Mật khẩu cũ không chính xác!');
            }  
        }else{
            return redirect('home/login');
        }
    }
    public function info_user($username){
        $user_real = User::where('username', $username)->get();
        $user_real1 = User::where('username', $username)->first();
        if($user_real1){
            $count_note = note::where('id_user', $user_real1->id)->count();
            $count_chat = chatbox::where('id_user_chat', $user_real1->id)->count();
            $cash = user::where('id', $user_real1->id)->first();
            $cash_now = $cash->cash;
            $days = Carbon::now()->diffInDays($user_real1->created_at);
            $data1 = assets::where('id_user', $user_real1->id)->orderByDesc('id')->paginate(3);
            $follow = follow::where('id_user', $user_real1->id)->count();
            // $sum = product::where('id_type', 1)->sum('price');
            if($user_real1->username == $username){
                if(Auth::check()){
                    $was_follow = follow::where('id_user_follow',Auth::user()->id)->where('id_user', $user_real1->id)->first();
                    return view('info-account.info-user',['user_real'=>$user_real,'count_note'=>$count_note,'days'=>$days, 'count_chat'=>$count_chat, 'cash_now'=>$cash_now, 'data1'=>$data1, 'follow'=>$follow, 'was_follow'=>$was_follow, 'username', $username]);
                }else{
                    return view('info-account.info-user',['user_real'=>$user_real,'count_note'=>$count_note,'days'=>$days, 'count_chat'=>$count_chat, 'cash_now'=>$cash_now, 'data1'=>$data1, 'follow'=>$follow]);
                }
            }else{
                return view('error.404');
            }
        }else{
            return view('error.404');
        } 
    }
    public function fetch_data(Request $request, $username){
        if($request->ajax()){ 
            $user_real1 = User::where('username', $username)->first();
            $data1 = assets::where('id_user', $user_real1->id)->orderByDesc('id')->paginate(3);
            return view('info-account.info-user-content', compact('data1'))->render();
        }else{
            return view('error.404');
        }
    }
    public function follow(Request $request){
        if(Auth::check()){
            $id_user = $request->id_user;
            $id_user_fl = Auth::id(); 
            $was_follow = follow::where('id_user_follow',Auth::id())->where('id_user', $request->id_user)->first();
            if($was_follow == null){
                if($id_user != $id_user_fl){
                    $follow = new follow();
                    $follow->id_user = $id_user;
                    $follow->id_user_follow = $id_user_fl;
                    $follow->save();
                    return redirect()->back();
                }else{
                    return redirect()->back()->with('danger', 'Bạn không thể tự theo dõi chính mình!');
                }
            }else{
                if($id_user != $id_user_fl){
                    $un_follow = follow::find($was_follow->id);
                    $un_follow->delete();
                    return redirect()->back();
                }else{
                    return redirect()->back()->with('danger', 'Bạn không thể tự theo dõi chính mình!');
                }
                return redirect()->back();
            }
            
        }else{
            return redirect('home/login');
        }
    }
}