<div class="float-right">{{ $data->links() }}</div>
@foreach ($data as $item)
    <div class="card">
        <br>
        <div class="card-header">
        <h3><b>{{ $item['title'] }}</b> </h3><i>Thời gian: {{ $item['time'] }}</i>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                @if($item['short_content'])
                <p>Mô tả ngắn: <b>{{ $item['short_content'] }}</b></p>    
                @else
                <p>Mô tả ngắn: <b class="text-danger">Trống</b></b></p>
                @endif
            <a href="home/detail/{{ $item['id'] }}" class="btn btn-primary float-right">Xem</a>
            </blockquote>
        </div>
        <hr>
    </div>
@endforeach 
<div class="cangiua">{{ $data->links() }}</div>