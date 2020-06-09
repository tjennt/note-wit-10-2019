@extends('account.layout-user')
@section('title', 'Đổi mật khẩu')
@section('user')
    
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <script>
                    function validateForm() {
                        var x = document.forms["myForm"]["password"].value;
                        var y = document.forms["myForm"]["password1"].value;
                        var z = document.forms["myForm"]["password2"].value;
                        if (x == "") {
                            return false;
                        }else if (y == "") {
                            return false;
                        }else if (z == "") {
                            return false;
                        }else{
                            document.getElementById("submit").style.display ='none';
                            document.getElementById("loader").style.display ='block';
                        }
                    }
                </script>
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Đổi mật khẩu</h2>
                    @if (session('danger'))
                        <div class="alert alert-success" style="color: #fff;" role="alert">{{ session('danger') }}</div>
                    @elseif (session('danger1'))
                        <div class="alert alert-success1" style="color: #fff;" role="alert">{{ session('danger1') }}</div>
                    @else
                    @endif
                    <form name="myForm" onsubmit="return validateForm()" method="post">
                            @csrf
                        <div class="input-group">
                            <input type="password" class="input--style-3" placeholder="Mật khẩu cũ" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Mật khẩu phải chứa 8 ký tự trở lên và có ít nhất 1 số, chữ thường và chữ hoa !" name="password" required>
                        </div>
                        <div class="input-group">
                            <input type="password" class="input--style-3" placeholder="Mật khẩu mới" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Mật khẩu phải chứa 8 ký tự trở lên và có ít nhất 1 số, chữ thường và chữ hoa !" name="password1" required>
                        </div>
                        <div class="input-group">
                            <input type="password" class="input--style-3" placeholder="Xác nhận mật khẩu mới" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Mật khẩu phải chứa 8 ký tự trở lên và có ít nhất 1 số, chữ thường và chữ hoa !" name="password2" required>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" id="submit" type="submit">Đổi mật khẩu</button>
                            <div class="loader" id="loader"></div>
                        </div>
                    </form>
                    <div class="p-t-10">                     
                        <a href="{{ url('home/login') }}" style="color:#fff;">Đăng nhập?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection