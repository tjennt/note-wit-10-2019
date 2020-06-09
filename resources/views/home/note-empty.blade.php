@extends('home.layout')
@section('titlee','Danh sách nhật kí')
@section('content')
    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <meta name="_token" content="{{ csrf_token() }}">
        <style>
            .changecolor{
                background: linear-gradient(200deg, #ccc, #9c27b0) !important;
                box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;
                color:#fff;
            }
            .text-black{
                color: #000 !important;
            }
            .breadcrumb-item+.breadcrumb-item::before {
                color: #fff !important;
            }
            .breadcrumb-item{
                margin-bottom:-150px;
            }
            .breadcrumb{
                padding: unset !important;
            }
        </style>
    </head>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10" style="margin: 0 auto;">
                <div class="card card-user">
                    <div class="card-header changecolor" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                        <nav aria-label="breadcrumb" >
                            <ol class="breadcrumb" style="background:none;">
                                <li class="breadcrumb-item"><a class="text-black" href="home/redirect-note">Home</a></li>
                                <li class="breadcrumb-item"><a style="color:#fff;" href="home/note">Note</a></li>
                            </ol>
                        </nav>
                        <h3 class="title text-center" style="font-family: monospace; font-size: 2.5rem;">Nhật kí của {{ $user }}</h3>
                    </div>  
                </div>
                <br>
                @if(session('danger'))
                    <div class="alert alert-success" role="alert">
                        <b>Thông báo:</b> {{ session('danger')  }}
                    </div>
                @else
                @endif    
                    <h3 class="text-center">Trống</h3>       
                <br>
                <br>
            </div>
        </div>
    </div>
        <!-- End Content -->
        <br><br><br><br>

@endsection