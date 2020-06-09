@extends('home.layout')

@section('content')
    <head>
        <style>
            .accordion {
                background: none !important;
                padding: 0 !important;
                border: none !important;
            }    
            .accordion:before {
                content: unset;
            }
            .none-boxshadow{
                box-shadow: none;
            }
            .cut-text{
                width: 100px;
                overflow: hidden;
                white-space: nowrap; 
                text-overflow: ellipsis;
            }
        </style>
    </head>
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10" style="margin: 0 auto;">
                    <div class="card card-user">   
                        <div class="card-header" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                            <h3 class="title text-center" style="font-family: monospace; font-size: 2.5rem;">Bảng xếp hạng</h3>
                        </div>       
                        <br>                
                        <div class="card-body" id="top">
                            <div class="text-center">
                                <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Top cash
                                </button>
                            
                                <button class="btn btn-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Top nhật kí
                                </button>
                                <button class="btn btn-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Top chat
                                </button>
                                <button class="btn btn-warning collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Top Follow
                                </button>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="card none-boxshadow">
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="row justify-content-center" style="cursor: auto;">
                                            <div class="col-sm-12 col-md-8">
                                                <h4 class="text-center"><b>TOP 10 GIÀU NHẤT</b></h4>
                                                @foreach($data as $key => $item)
                                                <div class="col-sm" style="list-style: none; cursor: initial; clear:both; border-botton:1px red solid;">
                                                    @if($item['image'] == 'user.jpg')
                                                        <label class="float-left">
                                                            @if($key+1 == 10)
                                                            #{{ $key+1 }}
                                                            @else
                                                            #0{{ $key+1 }}
                                                            @endif
                                                        </label>
                                                        <img class="avatar border-gray float-left" style="width:3em; height: 3em; border-radius:50%; box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/faces_default/user.jpg" alt="{{ $item['image'] }}" title="{{ $item['username'] }}">
                                                    @else
                                                        <label class="float-left">
                                                            @if($key+1 == 10)
                                                            #{{ $key+1 }}
                                                            @else
                                                            #0{{ $key+1 }}
                                                            @endif
                                                        </label>
                                                        <img class="avatar border-gray float-left" style="width:3em; height: 3em; border-radius:50%; box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/{{ $item['image'] }}" alt="{{ $item['image'] }}" title="{{ $item['username'] }}">
                                                    @endif
                                                    <h6 class="float-left ml-3"><a href="home/info/{{ $item['username'] }}"><p class="cut-text" title="{{ $item['username'] }}"> {{ $item['username'] }}</p></a></h6>
                                                    <h5 class="float-right"><i style="color:red;">{{ number_format($item['cash'], 0, ',', '.') }}</i> cash</h5>
                                                </div>
                                                @endforeach
                                            </div>
                                       
                                        </div>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="row justify-content-center" style="cursor: auto;">
                                            <div class="col-sm-6 col-md-8">
                                                <h4 class="text-center"><b>TOP 10 NHẬT KÍ</b></h4>
                                                @foreach($data1 as $key => $item)
                                                <div class="col-sm" style="list-style: none; cursor: initial; clear:both; border-botton:1px red solid;">
                                                    @if($item->user['image'] == 'user.jpg')
                                                        <label class="float-left">
                                                            @if($key+1 == 10)
                                                            #{{ $key+1 }}
                                                            @else
                                                            #0{{ $key+1 }}
                                                            @endif
                                                        </label>
                                                        <img class="avatar border-gray float-left" style="width:3em; height: 3em; border-radius:50%; box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/faces_default/user.jpg" alt="{{ $item->user['image'] }}" title="{{ $item->user['username'] }}">
                                                    @else
                                                        <label class="float-left">
                                                            @if($key+1 == 10)
                                                            #{{ $key+1 }}
                                                            @else
                                                            #0{{ $key+1 }}
                                                            @endif
                                                        </label>
                                                        <img class="avatar border-gray float-left" style="width:3em; height: 3em; border-radius:50%; box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/{{ $item->user['image'] }}" alt="{{ $item['image'] }}" title="{{ $item->user['username'] }}">
                                                    @endif
                                                    <h6 class="float-left ml-3"><a href="home/info/{{ $item->user['username'] }}" title="{{ $item->user['username'] }}"><p class="cut-text"> {{ $item->user['username'] }}</p></a></h6>
                                                    <h5 class="float-right"><i style="color:red;">{{ number_format($item['total'], 0, ',', '.') }}</i> bài</h5>
                                                </div>
                                                @endforeach
                                                
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="row justify-content-center" style="cursor: auto;">
                                            <div class="col-sm-6 col-md-8">
                                                <h4 class="text-center"><b>TOP CHAT NHIỀU NHẤT</b></h4>
                                                @foreach($data2 as $key => $item)
                                                <div class="col-sm" style="list-style: none; cursor: initial; clear:both; border-botton:1px red solid;">
                                                    @if($item->user['image'] == 'user.jpg')
                                                        <label class="float-left">
                                                            @if($key+1 == 10)
                                                            #{{ $key+1 }}
                                                            @else
                                                            #0{{ $key+1 }}
                                                            @endif
                                                        </label>
                                                        <img class="avatar border-gray float-left" style="width:3em; height: 3em; border-radius:50%; box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/faces_default/user.jpg" alt="{{ $item->user['image'] }}" title="{{ $item->user['username'] }}">
                                                    @else
                                                        <label class="float-left">
                                                            @if($key+1 == 10)
                                                            #{{ $key+1 }}
                                                            @else
                                                            #0{{ $key+1 }}
                                                            @endif
                                                        </label>
                                                        <img class="avatar border-gray float-left" style="width:3em; height: 3em; border-radius:50%; box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/{{ $item->user['image'] }}" alt="{{ $item->user['image'] }}" title="{{ $item->user['username'] }}">
                                                    @endif
                                                     <h6 class="float-left ml-3"><a href="home/info/{{ $item->user['username'] }}" title="{{ $item->user['username'] }}"><p class="cut-text"> {{ $item->user['username'] }}</p></a></h6>
                                                    <h5 class="float-right"><i style="color:red;">{{ number_format($item['total'], 0, ',', '.') }}</i> chat</h5>
                                                </div>
                                                @endforeach
                                                
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-6 col-md-8">
                                                <h4 class="text-center"><b>TOP FOLLOW NHIỀU NHẤT</b></h4>
                                                @foreach($data3 as $key => $item)
                                                <div class="col-sm" style="list-style: none; cursor: initial; clear:both; border-botton:1px red solid;">
                                                    @if($item->user['image'] == 'user.jpg')
                                                        <label class="float-left">
                                                            @if($key+1 == 10)
                                                            #{{ $key+1 }}
                                                            @else
                                                            #0{{ $key+1 }}
                                                            @endif
                                                        </label>
                                                        <img class="avatar border-gray float-left" style="width:3em; height: 3em; border-radius:50%; box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/faces_default/user.jpg" alt="{{ $item->user['image'] }}" title="{{ $item->user['username'] }}">
                                                    @else
                                                        <label class="float-left">
                                                            @if($key+1 == 10)
                                                            #{{ $key+1 }}
                                                            @else
                                                            #0{{ $key+1 }}
                                                            @endif
                                                        </label>
                                                        <img class="avatar border-gray float-left" style="width:3em; height: 3em; border-radius:50%; box-shadow: 2px 2px 10px 2px #452942; object-fit: cover;" src="storage/app/public/faces/{{ $item->user['image'] }}" alt="{{ $item->user['image'] }}" title="{{ $item->user['username'] }}">
                                                    @endif
                                                     <h6 class="float-left ml-3"><a href="home/info/{{ $item->user['username'] }}" title="{{ $item->user['username'] }}"><p class="cut-text"> {{ $item->user['username'] }}</p></a></h6>
                                                    <h5 class="float-right"><i style="color:red;">{{ number_format($item['total'], 0, ',', '.') }}</i> Follow</h5>
                                                </div>
                                                @endforeach
                                                
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection