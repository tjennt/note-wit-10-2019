@extends('home.layout')
@section('titlee','Chỉnh sửa tài khoản')
@section('content')
        <head>
            <link rel="stylesheet" type="text/css" href="assets/css/normalize1.css" />
            <link rel="stylesheet" type="text/css" href="assets/css/component.css" />
            <style>
                    .alert {
                        border: 0;
                        border-radius: 10px;
                        padding: 20px 15px;
                        line-height: 20px;
                    }
                    .alert.alert-success {
                        background-color: brown;
                        color: #ffffff;
                        text-align: center;
                        font-size: 0.8rem;
                    }
                    .alert.alert-success1 {
                        background-color: forestgreen;
                        color: #ffffff;
                        text-align: center;
                        font-size: 0.8rem;
                    }
                </style>
                <script src= 
                "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> 
                  </script>
        </head>
        <br>
        <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8" style="margin: 0 auto;">
                            <div class="card">
                                    <div class="card-header" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                                            <h3 class="title text-center" style="font-family: monospace; font-size: 2rem;">Chỉnh sửa tài khoản</h3>
                                        </div> 
                                @if (session('danger'))
                                    <div class="alert alert-success" style="color: #fff;" role="alert">{{ session('danger') }}</div>
                                @elseif (session('danger1'))
                                    <div class="alert alert-success1" style="color: #fff;" role="alert">{{ session('danger1') }}</div>
                                @else
                                @endif
                                @foreach ($data as $item)
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>Tên đăng nhập</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="{{ $user }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-7 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Địa chỉ email</label>
                                                    <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email của bạn không đúng" name="email" placeholder="Email" value="{{ $item['email'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label>Họ và tên</label>
                                                    <input type="text" class="form-control"  placeholder="Tên" name="name" pattern=".{3,255}" title="Họ và tên của bạn phải trên 3 kí tự" value="{{ $item['name'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input type="tel" class="form-control" name="phone" pattern="[0-9]{3}[0-9]{4}[0-9]{3}" title="Số điện thoại của bạn không đúng" placeholder="Home Address" value="{{ $item['phone'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Ảnh hồ sơ (jpg, png, jpge,..)</label><br>
                                                        <input type="file" name="image" id="file-2" style="display: none;" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" accept="image/gif, image/jpeg, image/png"/>
                                                        <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Chọn ảnh của bạn&hellip;</span></label>
                                                        <br>
                                                        <span id="output"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Giới thiệu</label>
                                                    
                                                    <input type="text" class="form-control" value="{{ $item['info'] }}" name="info" style="height: 3rem;" required pattern=".{3,255}">
                                                </div>
                                            </div>
                                        </div>  
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Cập nhật</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>                                  
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript"> 
                $('#file-2').on('change', function() { 
        
                    const size =  
                    (this.files[0].size / 1024 / 1024).toFixed(2); 
        
                    if (size >=2) { 
                        alert('Dung lượng ảnh phải dưới 2MB'); 
                        $('#file-2').val('');
                    } else { 
                        $("#output").html('<b>' + 
                         size + " MB" + '</b>'); 
                    } 
                }); 
            </script> 
            <script src="assets/js/custom-file-input.js"></script>
@endsection