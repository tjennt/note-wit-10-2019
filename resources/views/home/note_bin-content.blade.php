<div class="float-right">{{ $data->links() }}</div>
@foreach ($data as $item)
    <br>
    <br>
    <div class="card">
        <div class="card-header">
        <h3><b>{{ $item['title'] }}</b> </h3><i>Thời gian: {{ $item['time'] }}</i>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <p>Mô tả ngắn: <b>{{ $item['short_content'] }}</b></p>
            <a class="btn btn-info float-right" href="home/restore-note/{{ $item['id'] }}">Phục hồi</a> 
            <button type="button" class="float-right btn btn-danger xoasua" data-toggle="modal" data-target="#exampleModalCenter{{ $item['id'] }}">Xóa</button>  
            </blockquote>
        </div>
    </div>
    <hr>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Nhật kí sau khi xóa sẽ không thể khôi phục!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <a class="float-right btn btn-info btn-fill xoasua" href="home/delete-note-bin/{{ $item['id'] }}">Xác nhận</a>
            </div>
            </div>
        </div>
    </div>
    {{-- End modal --}}
@endforeach 
<div class="cangiua">{{ $data->links() }}</div>