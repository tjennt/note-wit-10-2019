@extends('home.layout')
@section('titlee','Tài xỉu | Trò chơi')
@section('content')
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7" style="margin: 0 auto;">
                    <div class="card card-user">   
                        <div class="card-header" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                            <h3 class="title text-center" style="font-family: monospace; font-size: 2.5rem;">Tài xỉu</h3>
                        </div>    
                        @if(session('thongbao4'))
                        <div class="alert alert-danger text-center">{{ session('thongbao4') }}</div>     
                        @else
                        @endif             
                        <div class="card-body" style="background-color: #f5f5f5;" id="top">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 pl-4" style="border: 1px #ccc solid; border-radius:10px;">
                                    <form method="post">
                                        @csrf
                                        <input type="number" name="cash" id="cash" placeholder="Nhập số tiền" pattern="[0-9]" min="1" max="99999999999999999999999" class="form-control" style="width:100%;" required>
                                        <br>
                                        <br>
                                        <div>
                                            <label>
                                                <input type="checkbox" class="radio" value="0" name="taixiu" />Tài</label>
                                            <label>
                                                <input type="checkbox" class="radio" value="1" name="taixiu" />Xỉu</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Lắc</button>
                                    </form>
                                    
                                </div>
                                <div class="col-sm-12 col-md-6 pl-4"><a href="home/game/doanso/history"><h5 class="float-right">Lịch sử tài xỉu</h5></a></div>
                                @if(session('thongbao'))
                                <div class="col-sm-12 col-md-12 pl-4 text-center">
                                    <img src="assets/images/ketqua.gif" style="width:5rem;" alt="ketqua">
                                    <h3>{{ session('thongbao') }}</h3>
                                    <h4>Bạn đã chọn {{ session('thongbao1') }}</h4>
                                    <h5>Kết quả: {{ session('thongbao2') }}</h5>
                                    <p>Số tiền của bạn <b><i style="color:red;">{{ session('thongbao3') }}</i></b> cash</p> 
                                </div>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <br><br><br><br><br><br><br><br><br>
        <script>
            $("input:checkbox").on('click', function() {
                var $box = $(this);
                if ($box.is(":checked")) {
                    var group = "input:checkbox[name='taixiu']";
                    $(group).prop("checked", false);
                    $box.prop("checked", true);
                } else {
                    $box.prop("checked", false);
                }
            });
        </script>
@endsection