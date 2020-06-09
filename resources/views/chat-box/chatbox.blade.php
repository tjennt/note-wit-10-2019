@extends('home.layout')
@section('titlee','Chat box')
@section('content')
<br>
<div class="content">
    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <meta name="_token" content="{{ csrf_token() }}">
    </head>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10" style="margin: 0 auto;">
                <div class="card card-user">
                        <div class="card-header" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                            <h3 class="title text-center" style="font-family: monospace; font-size: 2.5rem;">Chat box</h3>
                        </div>  
                    
                    <div class="card-body">
                        <div class="author">
                            <div class="button-container mr-auto ml-auto">
                            </div>
                            <div class="row">

                                <div class="col-sm-10 col-md-10 pl-4" style="border:1px #ccc solid; border-radius: 5px;">
                                    <h4><i class="far fa-comment-dots"></i>Nhập chat (<b>{{ session()->get('user') }}</b>)</h4>    
                                    <br/>
                                    <input type="text" class="form-control" name="content" id="content" required/>
                                    <input type="button" name="sent" id="sent" value="Gửi" class="btn btn-info float-right" style="cursor:pointer;"/>
                                </div>
                                <div class="col-12 pl-4"><hr>
                                    <input type="button" class="btn btn-info float-right" value="Bật" id="onoff" onclick="onoff()" title="Bật để chat real time">
                                    <h4><i class="fas fa-address-card"></i> Chat Box</h4>
                                    <div id="result">
                                        <span class="color:green; ">Đang tải...</span> 
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>                              
                  
                    
                </div>
                <script>
                    $(document).ready(function(){
                        $("#sent").click(function(event){
                            var value = document.getElementById('content').value;
                            event.preventDefault();
                            if(value != ""){
                                $.ajax({
                                    type : 'get',
                                    url : '{{URL::to('home/get-chat-box')}}',
                                    data : {'content' : value},
                                    success:function(data){
                                        $('#content').val('');
                                        $("#result").load("home/chat-content");
                                        $("#result").load("home/chat-content");
                                    }
                                });
                            }else{
                                return false;
                            }
                        }); 
                        $(document).on('click', '.pagination a', function(event){
                            event.preventDefault(); 
                            var page = $(this).attr('href').split('page=')[1];
                            fetch_data(page);
                        });
                    
                        function fetch_data(page){
                            $.ajax({
                                url:"home/chat-content/fetch_data?page="+page,
                                success:function(data)
                                {
                                    $('#result').html(data);
                                }
                            });
                        }
                    });
                    $('#result').load('home/chat-content');

                    var reset = function () {
                        $('#result').load('home/chat-content');
                    };
                    // function reset_click(){
                    //     setInterval(reset, 1000);
                    // }
                    function onoff(){
                        currentvalue = document.getElementById('onoff').value;
                        if(currentvalue == "Bật"){ 
                            $('#onoff').toggleClass('btn-danger');
                            document.getElementById("onoff").value="Tắt";
                            playreset = setInterval(reset, 1000);
                        }else{
                            $('#onoff').toggleClass('btn-danger');
                            document.getElementById("onoff").value="Bật";
                            clearInterval(playreset); 

                        }
                    }
                    // I'ts ugly but works

                </script>
                <script type="text/javascript">
                    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                {{--                 
                <!-- Kết nối thư viện Jquery -->
                <script src="assets/js/jquery.js"></script>
                <!-- Kết nối file js/join.js -->
                <script src="assets/js/join.js"></script>
                <!-- Kết nối file js/sendmsg.js -->
                <script src="assets/js/sendmsg.js"></script>
                <!-- Kết nối file js/autoload.js -->
                <script src="assets/js/autoload.js"></script> --}}
            </div>
        </div>
    </div>
</div>
@endsection