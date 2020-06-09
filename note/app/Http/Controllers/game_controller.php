<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\log_game;
class game_controller extends Controller
{
    public function get_redirect(){
        if(Auth::check()){
            return view('game.game-redirect');
        }else{
            return redirect('home/login');
        }
    }
    public function get_doanso(){
        if(Auth::check()){
            return view('game.game-doanso');
        }else{
            return redirect('home/login');
        }
        
    }
    public function post_doanso(Request $request){
        $chars = "01";
        $ramdom = substr(str_shuffle($chars),0,1);
        $taixiu = $request->taixiu;
        $cash = $request->cash;
        $cash_now = Auth::user()->cash;
        if($cash <= $cash_now){
            if($cash != 0){
                if($taixiu != null){
                    if($ramdom == $taixiu){
                    if($taixiu == 0 && $ramdom == 0){
                        $log_game = new log_game();
                        $log_game->name_game = "taixiu";
                        $log_game->id_user = Auth::user()->id;
                        $log_game->status = 1;
                        $log_game->cash = $cash;
                        $log_game->save();
                        $user = user::find(Auth::user()->id);
                        $user->cash = Auth::user()->cash + $cash;
                        $user->save();
                        $thongbao = "Chúc mừng bạn đã chiến thắng!";
                        $thongbao1 = "tài";
                        $thongbao2 = "tài";
                        $thongbao3 = "+ " .$cash;
                        return redirect()->back()->with(['thongbao'=>$thongbao,'thongbao1'=>$thongbao1,'thongbao2'=>$thongbao2,'thongbao3'=>$thongbao3]);
                    }elseif($taixiu == 1 && $ramdom == 1){
                        $log_game = new log_game();
                        $log_game->name_game = "taixiu";
                        $log_game->id_user = Auth::user()->id;
                        $log_game->status = 1;
                        $log_game->cash = $cash;
                        $log_game->save();
                        $user = user::find(Auth::user()->id);
                        $user->cash = Auth::user()->cash + $cash;
                        $user->save();
                        $thongbao = "Chúc mừng bạn đã chiến thắng!";
                        $thongbao1 = "xỉu";
                        $thongbao2 = "xỉu";
                        $thongbao3 = "+ " .$cash;
                        return redirect()->back()->with(['thongbao'=>$thongbao,'thongbao1'=>$thongbao1,'thongbao2'=>$thongbao2,'thongbao3'=>$thongbao3]);
                    }else{
                        return view('error.404');
                    } 
                    }else{
                        if($ramdom == 0){
                            $log_game = new log_game();
                            $log_game->name_game = "taixiu";
                            $log_game->id_user = Auth::user()->id;
                            $log_game->status = 0;
                            $log_game->cash = $cash;
                            $log_game->save();
                            $user = user::find(Auth::user()->id);
                            $user->cash = Auth::user()->cash - $cash;
                            $user->save();
                            $thongbao = "Chúc bạn mai mắn lần sau!";
                            $thongbao1 = "xỉu";
                            $thongbao2 = "tài";
                            $thongbao3 = "- " .$cash;
                            return redirect()->back()->with(['thongbao'=>$thongbao,'thongbao1'=>$thongbao1,'thongbao2'=>$thongbao2,'thongbao3'=>$thongbao3]);
                        }elseif($ramdom == 1){
                            $log_game = new log_game();
                            $log_game->name_game = "taixiu";
                            $log_game->id_user = Auth::user()->id;
                            $log_game->status = 0;
                            $log_game->cash = $cash;
                            $log_game->save();
                            $user = user::find(Auth::user()->id);
                            $user->cash = Auth::user()->cash - $cash;
                            $user->save();
                            $thongbao = "Chúc bạn mai mắn lần sau!";
                            $thongbao1 = "tài";
                            $thongbao2 = "xỉu";
                            $thongbao3 = "- " .$cash;
                            return redirect()->back()->with(['thongbao'=>$thongbao,'thongbao1'=>$thongbao1,'thongbao2'=>$thongbao2,'thongbao3'=>$thongbao3]);
                        }else{
                            echo "df";
                        }
            
                    }
                }else{
                    return redirect()->back()->with('thongbao4', 'Bạn cho chọn tài hay xỉu !');
                }
            }else{
                return redirect()->back()->with('thongbao4', 'Vui lòng nhập giá trị lớn hơn 0 !'); 
            }
        }else{
            return redirect()->back()->with('thongbao4', 'Bạn không đủ tiền để cược !');
        }
        
    }
    public function get_history(){
        if(Auth::check()){
            $username = session()->get('user');
            $id_session = user::where('username', $username)->first();
            if($id_session->id == Auth::user()->id){
                $id_user = Auth::user()->id;
                $data = log_game::where('id_user', $id_user)->orderBy('id','desc')->paginate(10);
                $cash_win = log_game::where('id_user',$id_user)->where('name_game','taixiu')->where('status', 1)->sum('cash');
                $cash_lost = log_game::where('id_user',$id_user)->where('name_game','taixiu')->where('status', 0)->sum('cash');
                return view('game.history-doanso',['data'=>$data])->with(['user'=>$username,'cash_win'=>$cash_win, 'cash_lost'=>$cash_lost]);
            }else{
                return view('error.404');
            }
            
        }else{
            return redirect('home/login');
        }
        
    }
    public function fetch_data(Request $request){
        $id_user = Auth::user()->id;
        if($request->ajax()){ 
            if(Auth::check()){
                $username = session()->get('user');
                $id_session = user::where('username', $username)->first();
                if($id_session->id == Auth::user()->id){
                    $data = log_game::where('id_user', $id_user)->orderBy('id','desc')->paginate(10);
                    return view('game.doanso-content', compact('data'))->render();
                }else{
                    return view('error.404');
                }
            }else{
                return view('error.404');
            } 
        }else{
            return view('error.404');
        }
    }
}