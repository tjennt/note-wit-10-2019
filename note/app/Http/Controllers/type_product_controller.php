<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\product;
use App\type_product;
use App\assets;
use App\User;
class type_product_controller extends Controller
{
    public function get_store(){
        return redirect('home/store/all');
    }
    public function get_detail($url_name){
        if(Auth::check()){
            $data2 = type_product::where('url_name', $url_name)->first();
            if($data2){
                $data = product::where('id_type', $data2->id)->orderByDesc('id')->paginate(6);
                $data1 = type_product::all();
                $name_type = $data2->name;
                $url_name = $data2->url_name;
                $cash = Auth::user()->cash;
                return view('store.type_all',['data'=>$data, 'data1'=>$data1])->with(['name_type'=>$name_type,'cash'=> $cash, 'url_name'=>$url_name]);
            }elseif($url_name == 'all'){
                $data = product::orderByDesc('id')->paginate(6);
                $data1 = type_product::all();
                $cash = Auth::user()->cash;
                $name_type = 'Tất cả sản phẩm';
                $url_name = 'all';
                return view('store.type_all',['data'=>$data, 'data1'=>$data1])->with(['name_type'=>$name_type,'cash'=> $cash, 'url_name'=>$url_name]);
            }else{
                return view('error.404');
            }
        }else{
            return redirect('home/login');
            
        }
    }
    public function fetch_data(Request $request, $url_name){
        $id_user = Auth::user()->id;
        if($request->ajax()){ 
            if(Auth::check()){
                if($url_name == 'all'){
                    $data = product::orderByDesc('id')->paginate(6);
                    return view('store.type_all_content', compact('data'))->render();
                }else{
                    $data2 = type_product::where('url_name', $url_name)->first();
                    if($data2){
                        $data = product::where('id_type', $data2->id)->orderByDesc('id')->paginate(6);
                        return view('store.type_all_content', compact('data'))->render();
                    }else{
                        return view('error.404');
                    }
                }   
            }else{
                return view('error.404');
            } 
        }else{
            return view('error.404');
        }
    }
    public function buy_product(Request $request){
        if($request->id_product){
            $id_product = $request->id_product;
            $product = product::where('id',$id_product)->first();
            if(Auth::check()){
                $id_user = Auth::user()->id;
                $cash_now = Auth::user()->cash;
                if($cash_now >= $product->price){
                    $assets = assets::where('id_user', $id_user)->where('id_product', $id_product)->first();
                    if($assets == null){
                        $buy_product = new assets();
                        $buy_product->id_product = $id_product;
                        $buy_product->id_user = $id_user;
                        $buy_product->save();
                        $minus = user::find($id_user);
                        $minus->cash = $cash_now - $product->price;
                        $minus->save();
                        return redirect()->back()->with('success', 'Mua hàng thành công!');
                    }else{
                        return redirect()->back()->with('danger', 'Bạn đã sở hữu sản phẩm!');
                    }
                }else{
                    return redirect()->back()->with('danger', 'Bạn chưa đủ tiền để mua!');
                }
            }else{
                return redirect('home/login');
            }
        }else{
            return view('error.404');
        }
    }
}
