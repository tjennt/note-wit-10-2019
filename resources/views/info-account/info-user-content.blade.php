@foreach($data1 as $item)
    <div class="card col-md-4 mr-0.1" style="padding: 5px 5px 0px 5px !important">
    <div style="width: 100%; height: 10rem; background-color:#ccc;">
        <img src="storage/app/public/products/{{ $item->product['image'] }}" style="object-fit: cover; height: -webkit-fill-available;" class="card-img-top" alt="{{ $item['image'] }}" title="{{ $item['name'] }}">    
    </div>  
    <div class="card-body" style="background: none !important;">
        <h5 class="card-title">{{ $item->product['name'] }}</h5>
        <p class="card-text">{{ $item['content'] }}</p>
        <p class="card-text"><b>Trị giá: <b style="color:red;">{{ number_format($item->product['price'], 0, ',', '.') }}</b> cash</b></p>
    </div>
</div>
@endforeach
<div class="cangiua" style="width:100%">{{ $data1->links() }}</div>