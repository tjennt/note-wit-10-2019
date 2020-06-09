@foreach ($data as $item)
    <div>
        @if($item->user['image'] == 'user.jpg')
           <img src="storage\app\public\faces\faces_default\user.jpg" alt="{{ $item->user['image'] }}" style="width: 3.5rem; height: 3.5rem; border-radius:50%; object-fit: cover;">
        @else
            <img src="storage\app\public\faces\{{ $item->user['image'] }}" alt="{{ $item->user['image'] }}" style="width: 3.5rem; height: 3.5rem; border-radius:50%; object-fit: cover;">
        @endif
        @if($item->user['level'] == 2)
        <b><a href="home/info/{{ $item->user['username'] }}" style="font-size:12pt; text-transform: uppercase;" title="{{ $item->user['username'] }}"> {{ $item->user['username'] }} </a><i style="font-size:15pt; color: red;">(Admin)</i></b>
        @elseif($item->user['level'] == 3)
        <b><a href="home/info/{{ $item->user['username'] }}" style="font-size:12pt; text-transform: uppercase;" title="{{ $item->user['username'] }}"> {{ $item->user['username'] }} </a><i style="font-size:15pt; color: blue;">(Smod)</i></b>
        @elseif($item->user['cash'] >= 10000000)
        <b><a href="home/info/{{ $item->user['username'] }}" style="font-size:12pt; text-transform: uppercase;" title="{{ $item->user['username'] }}"> {{ $item->user['username'] }} </a><i style="font-size:15pt; color: green;">(Richkid)</i></b>
        @elseif($item->user['level'] == 1)
        <b><a href="home/info/{{ $item->user['username'] }}" style="font-size:12pt; text-transform: uppercase;" title="{{ $item->user['username'] }}"> {{ $item->user['username'] }} </a><i style="font-size:15pt; color: pink;">(Dân thường)</i></b>
        @else
        <b><a href="home/info/{{ $item->user['username'] }}" style="font-size:12pt; text-transform: uppercase;" title="{{ $item->user['username'] }}"> {{ $item->user['username'] }} </a></b>
        @endif
    
        {{-- <a class="btn btn-danger float-right" href="home/delete-chat-box/{{ $item['id'] }}" style="color: #fff;">Xóa</a> --}}
        <br>
        <p style="font-size: 14pt;">{{ $item['content']  }}</p> 
        <span class="float-right">{{ $item['created_at'] }}</span>
        <br>
        <hr>
    </div>   
@endforeach
<div class="cangiua">{{ $data->links() }}</div>