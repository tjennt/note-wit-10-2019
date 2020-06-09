@extends('home.layout')
@section('titlee','Lịch sử tài xỉu | Trò chơi')
@section('content')
<head>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <meta name="_token" content="{{ csrf_token() }}">
        <style>
        .table th{
            color: #000;
        }
        .col-md-7{
            padding-left: unset;
            padding-right: unset;
        }
        </style>
</head>
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7" style="margin: 0 auto;">
                    <div class="card card-user">   
                        <div class="card-header" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                            <h3 class="title text-center" style="font-family: monospace; font-size: 2.5rem;">Lịch sử tài xỉu</h3>
                        </div>    
                        @if(session('thongbao4'))
                        <div class="alert alert-danger text-center">{{ session('thongbao4') }}</div>     
                        @else
                        @endif             
                        <div class="card-body" style="background-color: #f5f5f5;" id="top">
                            <h6>Lịch sử tài xỉu của <b class="text-danger">{{ $user }}</b></h6>
                            <i><span>ミTổng số tiền thắng: <b class="text-success">{{ number_format($cash_win, 0, ',', '.') }} </b>cash.</span></i>
                            <br>
                            <i><span>ミTổng số tiền thua: <b class="text-danger">{{ number_format($cash_lost, 0, ',', '.') }} </b>cash.</span></i>
                            <div class="row">
                                <div class="col-sm-12 col-md-12" id="row">
                                    @include('game.doanso-content')
                                </div>
                                
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
        $(document).ready(function(){
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"home/game/doanso/fetch_data/?page="+page,
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