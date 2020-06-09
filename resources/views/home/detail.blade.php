@extends('home.layout')

@section('content')
    <style>
        .content-item img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 60%;
            height: 60%;
        }
        .clear-both{
            clear: both;
        }
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
    </style>
    @foreach ($data as $item)
    @section('titlee',$item['title'] .' | Xem nhật kí')
    <br>
    <div class="container">
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card strpied-tabled-with-hover">
                                    <div class="card-header changecolor">
                                            <nav aria-label="breadcrumb" >
                                                <ol class="breadcrumb" style="background:none;">
                                                    <li class="breadcrumb-item"><a class="text-black" href="home/info">Home</a></li>
                                                    <li class="breadcrumb-item"><a class="text-black" href="home/note">Note</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page" style="color: whitesmoke;">{{ $item['title'] }}</li>
                                                </ol>
                                            </nav>
                                        <h3 class="card-title" style="color: #fff;">{{ $item['title'] }}</h3>
                                        <p class="float-left">{{ $item['short_content'] }}</p>
                                        <p class="float-right">{{ $item['time'] }}</p>
                                        <br>
                                        <br>
                                        <button type="button" class="float-right btn btn-danger xoasua clear-both" data-toggle="modal" data-target="#exampleModalCenter">Xóa</button>  
                                        <a class="float-right btn btn-warning" href="home/edit-note/{{ $item['id'] }}">Sửa</a>
                                    </div>
                                    <br>
                                    <div class="border ml-3 mr-3 card-body table-full-width content-item">
                                        <h4>{!! $item['content'] !!}</h4>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            
                    </div>
                </div>  
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Nhật kí khi xóa sẽ chuyển đến thùng rác !
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <a class="float-right btn btn-info btn-fill xoasua" href="home/delete-note/{{ $item['id'] }}">Xác nhận</a>
                        </div>
                        </div>
                    </div>
                </div>
                {{-- End modal --}}
            <!-- End Content -->
        @endforeach
    </div>
    </div>
    <br><br><br><br><br><br><br><br>
@endsection