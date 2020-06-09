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
      <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
     <!-- CSS Just for demo purpose, don't include it in your project -->
     <link href="assets/css/demo.css" rel="stylesheet" />
     <link href="assets/css/material-kit.css?v=2.0.6" rel="stylesheet" />
     <script type='text/javascript' src='assets/textboxio-client/textboxio/textboxio.js'></script>
     <meta name="_token" content="{{ csrf_token() }}">
     {{-- Link icon --}}
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
     <script>
        var instantiateTextbox = function () {
          // set the live reload status colour
          var status = document.querySelector('.status');
          if (status !== undefined) {
            if (typeof window.LiveReload === 'object') {
              status.classList.add('status-on');
            } else {
              
            }
          }else{
            
          }
  
          // listen for clicks on accordion elements
          document.body.addEventListener('click', function (event) {
            if (event.target.classList.contains('accordion')) {
              var header = event.target;
              var panel = header.nextElementSibling;
              header.classList.toggle('active');
              panel.classList.toggle('show');
            }
          });
  
          // load textbox.io with default settings twice, so one of them is in the more drawer
          textboxio.replaceAll('textarea', {
            ui: {
              toolbar: {
                items: [
                  'undo', 'insert', 'style', 'emphasis', 'align', 'listindent', 'format', 'tools',
                  'undo', 'insert', 'style', 'emphasis', 'align', 'listindent', 'format', 'tools'
                ]
              }
            }
          });
        };
      </script>
 </head>
 
 <body class="profile-page sidebar-collapse" onload="instantiateTextbox();">
        <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
          <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" style="padding-top: unset;" href="{{ url('/') }}">
                  <img src="assets/images/logo.png" alt="logo" width="120px">
                </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Nhật kí</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav ml-auto">
                {{-- <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    Components
                  </a>
                  <div class="dropdown-menu dropdown-with-icons">
                    <a href="../index.html" class="dropdown-item">
                      số 1
                    </a>
                    <a href="https://demos.creative-tim.com/material-kit/docs/2.1/getting-started/introduction.html" class="dropdown-item">
                      số 2
                    </a>
                  </div>
                </li> --}}
                <li class="nav-item">
                        <a class="nav-link" href="home/info/{{ session()->get('user') }}">
                            <i class="nc-icon nc-circle-09"></i>
                        <p>Trang cá nhân</p>
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('home/create-note') }}">
                            <i class="nc-icon nc-circle-09"></i>
                        <p>Viết nhật kí</p>
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('home/redirect-note') }}">
                            <i class="nc-icon nc-circle-09"></i>
                        <p>Nhật kí</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('home/note') }}">
                            <i class="nc-icon nc-circle-09"></i>
                        <p>Nhật kí</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home/note-bin') }}">
                      <i class="nc-icon nc-circle-09"></i>
                      <p>Thùng rác</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home/chat-box') }}">
                          <i class="nc-icon nc-circle-09"></i>
                      <p>Box chat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home/store') }}">
                      <i class="nc-icon nc-circle-09"></i>
                      <p>Cửa hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home/game') }}">
                      <i class="nc-icon nc-circle-09"></i>
                      <p>Trò chơi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('home/rank') }}">
                      <i class="nc-icon nc-circle-09"></i>
                      <p>Bảng xếp hạng</p>
                    </a>
                </li>
                <li class="nav-item">
                      @if(session()->has('user'))
                        <p class="nav-link">
                          {{ session()->get('user') }}
                          <a href="{{ url('home/logout') }}">
                              (logout)
                          </a>
                        </p>
                      @else
                        <a class="nav-link" href="{{ url('home/login') }}">
                          <i class="nc-icon nc-circle-09"></i>
                          <p>Login</p>
                        </a>
                      @endif
                    </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/anhbia2.jpg');"></div>
        <!-- End Navbar -->

    @yield('content')


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
                      <i class="fab fa-instagram"></i>Instagram
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/natriwit">
                        <i class="fab fa-facebook-square"></i>Facebook
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

<!--   Core JS Files   -->
{{-- <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script> --}}
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>



<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-kit.js?v=2.0.6" type="text/javascript"></script>


{{-- <script type="text/javascript">
$(document).ready(function() {
// Javascript method's body can be found in assets/js/demos.js
demo.initDashboardPageCharts();

demo.showNotification();

});
</script> --}}

</html>