@extends('home.layout')
@section('titlee','Cửa hàng')
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
                            <h3 class="title text-center" style="font-family: monospace; font-size: 2.5rem;"><a href="home/store/all" style="color: #fff;" title="Store all product">Cửa hàng NoteWit</a></h3>
                        </div>       
                        <br>  
                        @if(session('success'))
                        <div class="alert alert-success" style="border:1px coral solid;">
                                <h4 class="text-center">{{ session('success') }}</h4>
                        </div>
                        @elseif(session('danger'))
                            <div class="alert alert-danger" style="border:1px coral solid;">
                                <h4 class="text-center">{{ session('danger') }}</h4>
                            </div>
                        @else
                        @endif                
                        <div class="card-body" id="top">
                            <p class="float-right"><i class="fas fa-money-bill-wave"></i> Tài sản: <b style="color: red;">{{ number_format($cash, 0, ',', '.') }}</b> Cash.</p>   
                            @foreach( $data1 as $item)
                                <a href="home/store/{{ $item['url_name'] }}" class="btn btn-info">{{ $item['name'] }}</a>
                            @endforeach
                            <div class="author"><h3>{{ $name_type }}</h3>
                                <input type="hidden" value="{{ $url_name }}" id="url_name">
                                <hr>
                                <div class="row" id="row">
                                    @include('store.type_all_content')
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function(){
            var url_name = document.getElementById('url_name').value;

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
                location.href='home/store/'+url_name+'#top';
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"home/store/fetch_data/"+url_name+"?page="+page,
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