@extends('home.layout')
@section('content')
    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <meta name="_token" content="{{ csrf_token() }}">
    </head>
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10" style="margin: 0 auto;">
                        <div class="card card-user">
                            <style>
                                .card .card-body,
                                .card .card-footer {
                                    background-image: url('assets/img/anhbia.jpg');
                                    background-size: cover;
                                    border-top-left-radius: 5px;
                                    border-top-right-radius: 5px;
                                }
                            </style>
                            @foreach ($user_real as $item)
                            @section('titlee',$item['username'])
                            <div class="card-body">
                                <div class="author">
                                        @if($item['username'] == session()->get('user'))
                                        <div class="dropdown float-right">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cog"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{ url('home/edit-info') }}">Chỉnh sửa</a>
                                                    <a class="dropdown-item" href="{{ url('home/change-pass') }}">Đổi mật khẩu</a>
                                                </div>
                                                </div>
                                        @else
                                        @endif
                                        @if($item['image'] == 'user.jpg')
                                            <img class="avatar border-gray" style="box-shadow: 2px 2px 10px 2px #452942;  object-fit: cover;" src="storage/app/public/faces/faces_default/{{ $item['image'] }}" alt="{{ $item['username'] }}" title="{{ $item['username'] }}">
                                        @else
                                            <img class="avatar border-gray" style="box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/{{ $item['image'] }}" alt="{{ $item['username'] }}" title="{{ $item['username'] }}">
                                        @endif
                                        <h4 class="nav-link" style="padding: 0rem 0rem;">{{ $item['username'] }}</h4>
                                        @if($item['name'] != null)
                                        <h6>({{ $item['name'] }})</h6>
                                        @else
                                        @endif
                                        <div class="col-3 float-left" style="padding-left: unset;">
                                            <form method="post">
                                                @csrf
                                                <input type="hidden" name="id_user" value="{{ $item['id'] }}">
                                                @if(Auth::check())
                                                    @if($item['username'] != session()->get('user'))        
                                                        @if($was_follow == null)
                                                            <button type="submit" class="btn btn-info" style="font-size: 0.7rem; padding: unset; padding: 10px;"><b> Follow</b></button>
                                                        @else
                                                            <button type="submit" class="btn btn-danger" style="font-size: 0.7rem; padding: unset; padding: 10px;"><b> Un follow</b></button>
                                                        @endif
                                                    @else
                                                    @endif
                                                @else
                                                <a href="home/login" class="btn btn-info" style="font-size: 0.7rem; padding: unset; padding: 10px; color:#fff;"><b> Follow</b></a>
                                                @endif
                                            </form>
                                        </div>
                                        <h5 class="float-right"><i class="fas fa-users"></i> Có 
                                            <a href="#"><b style="color:#fff;">{{ number_format($follow, 0, ',', '.') }}</b></a> người theo dõi
                                        </h5>
                                </div>
                            </div>                              
                            
                            <div class="button-container mr-auto ml-auto">
                            </div>
                            <div class="row">
                                <div class="col-sm pl-4">
                                    <h4><i class="fas fa-address-card"></i> Giới thiệu</h4>
                                    @if($item['info'] != null)
                                        <p class="gioithieu">
                                            {{ $item['info'] }}
                                        </p>
                                    @else
                                        <p class="gioithieu" style="color:brown !important;">
                                            Chưa cập nhật thông tin
                                        </p>
                                    @endif 
                                </div>
                                <div class="col-sm pl-4">
                                    <h4><i class="fas fa-trophy"></i> Thành tích</h4>
                                    <p><i class="fas fa-user-clock"></i> Tham gia từ: <b style="color: red;">{{ $days }}</b> ngày trước <i style="color:#ccc; font-size: 0.8rem;">({{ $item['created_at'] }})</i>.</p>
                                    <p><i class="fas fa-money-bill-wave"></i> Tổng số tài sản: <b style="color: red;">{{ number_format($cash_now, 0, ',', '.') }}</b> Cash.</p>       
                                    <p><i class="fas fa-journal-whills"></i> Số nhật kí đã viết: <b style="color: red;">{{ number_format($count_note, 0, ',', '.') }}</b> bài viết.</p>
                                    <p><i class="far fa-comment-dots"></i> Số lượt chat: <b style="color: red;">{{ number_format($count_chat, 0, ',', '.') }}</b> lượt chat.</p>
                                    
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <input type="hidden" value="{{ $item['username'] }}" id="username">
                            {{--assets --}}
                            <h3 class="pl-2"><i class="fab fa-ethereum"></i> Tài sản</h3>
                            <div style="width:100%; background-color: #fff; padding: 0px 15px 0px 15px;">
                                <div class="row" id="row">
                                    @include('info-account.info-user-content')
                                </div>
                            {{-- End assets --}}
                        </div>
                        

                    </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault(); 
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });
            var username = document.getElementById('username').value;
            function fetch_data(page)
            {
                $.ajax({
                    url:"home/info/"+username+"/fetch_data?page="+page,
                    success:function(data)
                    {
                        $('#row').html(data);
                    }
                });
            }
            
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
@endsection