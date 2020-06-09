@foreach( $data as $item)
        <div class="card col-md-4 mr-0.1" style="padding: 5px 5px 0px 5px !important">
            <div style="width: 100%; height: 10rem; background-color:#ccc;">
                <img src="storage/app/public/products/{{ $item['image'] }}" style="object-fit: cover; height: -webkit-fill-available;" class="card-img-top" alt="{{ $item['image'] }}" title="{{ $item['name'] }}">    
            </div>  
            <div class="card-body">
                <h5 class="card-title">{{ $item['name'] }}</h5>
                <p class="card-text">{{ $item['content'] }}</p>
                <p class="card-text"><b>Giá: <b style="color:red;">{{ number_format($item['price'], 0, ',', '.') }}</b> cash</b></p>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" title="Xem {{ $item['name'] }}" data-target="#exampleModalCenter{{ $item['id'] }}">
                        Xem
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"><b>Tên: </b>{{ $item['name'] }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div style="width: 100%; height: 13rem; background-color:#ccc;">
                        <img src="storage/app/public/products/{{ $item['image'] }}" style="object-fit: cover; height: -webkit-fill-available;" class="card-img-top" alt="{{ $item['image'] }}" title="{{ $item['name'] }}">    
                    </div>  
                    <div class="modal-body">
                        <b>Mô tả: </b>{{ $item['content'] }}
                    <h3 class="card-text"><b>Giá:</b> <span style="color:red;">{{ number_format($item['price'], 0, ',', '.') }}</span> <sup style="font-size: 1rem;">cash</sup></h3>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <form method="post" action="home/store/buy-product">
                        @csrf
                        <input type="hidden" name="id_product" value="{{ $item['id'] }}">
                        <button type="submit" class="btn btn-primary" title="Mua sản phẩm">Mua</button>
                    </form>
                    
                    </div>
                </div>
                </div>
            </div>
        @endforeach
        <div class="cangiua" style="width: 100%;">{{ $data->links() }}</div>