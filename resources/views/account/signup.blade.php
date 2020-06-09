@extends('account.layout-user')
@section('title', 'Đăng kí tài khoản')
@section('user')
    
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <script>
                    function validateForm() {
                        var x = document.forms["myForm"]["username"].value;
                        var y = document.forms["myForm"]["email"].value;
                        var z = document.forms["myForm"]["password"].value;
                        var a = document.forms["myForm"]["password2"].value;
                        if (x == "") {
                            return false;
                        }else if (y == "") {
                            return false;
                        }else if (z == "") {
                            return false;
                        }else if (a == "") {
                            return false;
                        }else{
                            document.getElementById("submit").style.display ='none';
                            document.getElementById("loader").style.display ='block';
                        }
                    }
                </script>
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Đăng kí tài khoản</h2>
                    @if (session('danger'))
                        <div class="alert alert-success" style="color: #fff;" role="alert">{{ session('danger') }}</div>
                    @elseif(session('danger1'))
                        <div class="alert alert-success1" style="color: #fff;" role="alert">{{ session('danger1') }}<a style="color:violet;" href="{{ url('home/login') }}"> đăng nhập</a></div>
                    @else
                    @endif
                    <form name="myForm" onsubmit="return validateForm()" method="post">
                            @csrf
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Tên tài khoản" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" title="Tài khoản gồm các chữ cái và số, không sử dụng kí tự đặt biệt" name="username" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" pattern=".{3,255}" title="Email có ít nhất từ 3 kí tự nhiều nhất là 255 kí tự" name="email" required>
                        </div>
                        <div class="input-group">
                            <input type="password" class="input--style-3" placeholder="Mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,500}" title="Mật khẩu phải chứa 6-500 ký tự trở lên và có ít nhất 1 số, chữ thường và chữ hoa !" name="password" required>
                        </div>
                        <div class="input-group">
                                <input type="password" class="input--style-3" placeholder="Xác nhận mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,500}" title="Mật khẩu phải chứa 6-500 ký tự trở lên và có ít nhất 1 số, chữ thường và chữ hoa !" name="password2" required>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" id="submit" type="submit">Đăng kí</button>
                            <div class="loader" id="loader"></div>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <div class="p-t-10">
                        <a href="{{ url('home/login') }}" style="color:#fff;">Đăng nhập</a>
                        <br>
                        <a href="{{ url('home/forgotinfo') }}" style="color:#fff;">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection