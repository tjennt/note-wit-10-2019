<!DOCTYPE html>
 <html lang="vi">
 <head>
     <meta charset="utf-8" />
     <base href="{{asset('')}}">
    <style>
        .container{
            width: 100%;
            margin: 0 auto;
            color: #000;
            border: 1px #ccc solid;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 1.2rem;
        }
        .alert-dark {
            background-color: lightslategray;
            color: #ffffff;
            text-align: center;
        }

        .alert {
            border: 0;
            border-radius: 10px;
            padding: 20px 15px;
            line-height: 20px;
            margin-top: 0px;
        }
        .alert-dark1 {
            background-color: lightslategray;
            color: #ffffff;
            text-align: center;

        }

        .alert1 {
            border: 0;
            border-radius: 10px;
            padding: 5px 5px;
            line-height: 20px;
            margin-top: 0px;
        }
        .text-center{
            text-align: center;
        }
    </style>
 </head>
 <body class="profile-page sidebar-collapse">
     <div class="container">
        <h3 class="alert alert-dark text-center">Reset password | notewit</h3>
        <h4>Xin chào: <i class="text-warning">{{ $username }}</i> </h4>
        <h5>Chúng tôi đã giúp bạn thay đổi mật khẩu.</h5>
        <h5>Mật khẩu của bạn: <b class="alert1 alert-dark1" style="border-radius: 10px;">{{ $password }}</b></h5>
        <h5>Vui lòng đổi lại mật khẩu để bảo mật cho tài khoản của bạn!</h5>
        <h2 class="text-center"><i>notewit</i></h2>
    </div>

    
</body>











</body>
</html>