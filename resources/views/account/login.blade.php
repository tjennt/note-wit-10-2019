@extends('account.layout-user')
@section('title', 'Đăng nhập')
@section('user')
    
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <script>
                    function validateForm() {
                        var x = document.forms["myForm"]["username"].value;
                        var y = document.forms["myForm"]["password"].value;
                        if (x == "") {
                            return false;
                        }else if (y == "") {
                            return false;
                        }else{
                            document.getElementById("submit").style.display ='none';
                            document.getElementById("loader").style.display ='block';
                        }
                    }
                </script>
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Đăng nhập</h2>
                    @if (session('danger'))
                      <div class="alert alert-success" style="color: #fff;" role="alert">{{ session('danger') }}</div>
                    @elseif (session('danger1'))
                    <div class="alert alert-success1" style="color: #fff;" role="alert">{{ session('danger1') }}</div>
                    @else
                    @endif
                    <form name="myForm" onsubmit="return validateForm()" method="post">
                            @csrf
                        <div class="input-group">
                            <input class="input--style-3" type="text" value="{{ $cookie_user }}" placeholder="Tên tài khoản" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" title="Tài khoản gồm các chữ cái và số, không sử dụng kí tự đặt biệt" name="username" required>
                        </div>
                        <div class="input-group">
                            <input type="password" class="input--style-3" value="{{ $cookie_password }}"  placeholder="Mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,500}" title="Mật khẩu phải chứa 6 ký tự trở lên và có ít nhất 1 số, chữ thường và chữ hoa !" name="password" required>
                        </div>
                        <div class="">
                            <input type="checkbox" style="width:1.5rem" value="Nhớ" name="remember" checked><label style="color:azure; margin-botton: 0.5rem;">   Nhớ tài khoản</label>
                        </div>
                        
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" id="submit" type="submit">Đăng nhập</button>
                            <div class="loader" id="loader"></div>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <div class="p-t-10">
                        <a href="{{ url('home/signup') }}" class="btn btn--pill bg-bt">Đăng kí</a>
                        
                        <a href="{{ url('home/forgotinfo') }}" style="color:#fff;">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection