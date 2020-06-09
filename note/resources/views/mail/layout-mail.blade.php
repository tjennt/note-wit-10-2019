{{-- <h2>Xin chào: {{ $username }}</h2>
<h5>Mật khẩu cho tài khoản của bạn đã được thay đổi thành: {{ $password }}</h5>
<h5>Vui lòng đổi lại mật khẩu để bảo mật cho tài khoản của bạn!</h5>
<h5><i>Note Wit</i></h5> --}}
<!DOCTYPE html>
 <html lang="vi">
 <head>
     <meta charset="utf-8" />
     <base href="{{asset('')}}">
     <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
     <link rel="icon" type="image/png" href="assets/img/favicon.ico">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title> @yield('titlee') | Note Wit | For free</title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <!-- CSS Files -->
      {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> --}}
     <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <script src="assets/ckeditor/ckeditor.js"></script>
    <link href="assets/css/material-kit.css?v=2.0.6" rel="stylesheet" />
    <script type='text/javascript' src='assets/textboxio-client/textboxio/textboxio.js'></script>
    <style>
        .navbar{
            background: slategrey !important;
            color: #fff;
            border-radius: 10px;
            box-shadow: none;
        }
    </style>
 </head>
 <body class="profile-page sidebar-collapse">
     <div class="container" style="background-color:slategrey; width:40%;">
            <nav class="navbar navbar-color-on-scroll navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
                    <div class="container">
                      <div class="navbar-translate">
                          <a class="navbar-brand" href="{{ url('home/info') }}">
                          Note Wit </a>
                      </div>
                      <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                          <li class="nav-item">
                                  <a class="nav-link" href="{{ url('home/info') }}">
                                      <i class="nc-icon nc-circle-09"></i>
                                  <p>Thông tin</p>
                              </a>
                          </li>
                          <li class="nav-item">
                                  <a class="nav-link" href="{{ url('home/create-note') }}">
                                      <i class="nc-icon nc-circle-09"></i>
                                  <p>Viết nhật kí</p>
                              </a>
                          </li>
                          <li class="nav-item">
                                  <a class="nav-link" href="{{ url('home/note') }}">
                                      <i class="nc-icon nc-circle-09"></i>
                                  <p>Nhật kí</p>
                              </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                @yield('content-email')
                <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-home"></i>Trang chủ
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/wit_tb/">
                                    <i class="fa fa-instagram"></i>Instagram
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/natriwit">
                                <i class="fa fa-facebook-square"></i>Facebook
                                </a>
                          </li>
                      </ul>
                      <p class="copyright text-center">
                          ©
                          <script>
                              document.write(new Date().getFullYear())
                          </script>
                          <a href="/">Natriwit</a>, code by me.
                      </p>
                  </nav>
              </div>
              </footer>
              </div>
     </div>
    
</body>











</body>
</html>