@extends('home.layout')
@section('titlee','Trò chơi')
@section('content')
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7" style="margin: 0 auto;">
                    <div class="card card-user">   
                        <div class="card-header" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                            <h3 class="title text-center" style="font-family: monospace; font-size: 2.5rem;">Trò chơi</h3>
                        </div>                      
                        <div class="card-body" id="top">
                            <h4>Bạn muốn chơi game gì ?</h4>
                            <a href="home/game/doanso" class="btn btn-warning">Tài xỉu</a>
                        </div>
                    </div>
                </div>
            </div>
        <br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br>
@endsection