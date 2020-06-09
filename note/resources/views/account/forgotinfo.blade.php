@extends('account.layout-user')
@section('title', 'Quên mật khẩu')
@section('user')
    
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <script>
                    function validateForm() {
                        var x = document.forms["myForm"]["username"].value;
                        var y = document.forms["myForm"]["email"].value;
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
                    <h2 class="title">Quên mật khẩu</h2>
                    @if (session('danger'))
                        <div class="alert alert-success" style="color: #fff;" role="alert">{{ session('danger') }}</div>
                    @elseif (session('danger1'))
                        <div class="alert alert-success1" style="color: #fff;" role="alert">{{ session('danger1') }}</div>
                    @else
                    @endif
                    <form  name="myForm" onsubmit="return validateForm()" method="post">
                            @csrf
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Tên tài khoản" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" title="Tài khoản gồm các chữ cái và số, không sử dụng kí tự đặt biệt" name="username" required>
                        </div>
                        <div class="input-group">
                            <input type="email" class="input--style-3" placeholder="Email" pattern=".{1,255}" title="Email có ít nhất từ 3 kí tự nhiều nhất là 255 kí tự" name="email" required>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" id="submit" type="submit">Lấy lại mật khẩu</button>
                            <div class="loader" id="loader"></div>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <div class="p-t-10">
                        <a href="{{ url('home/login') }}" style="color:#fff;">Đăng nhập |</a>   
                        <a href="{{ url('home/signup') }}" style="color:#fff;">Đăng kí</a><br><br>
                        <a href="{{ url('home/forgotinfo') }}" style="color:#fff;">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection