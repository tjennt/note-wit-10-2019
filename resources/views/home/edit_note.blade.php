@extends('home.layout')
@section('content')
<style>
    .ephox-polish-editor-container.ephox-polish-fullscreen-maximized {
        position: fixed !important;
    }
    .ephox-textbox-font[dir=ltr] .ephox-polish-html-switch-wrapper>.ephox-polish-html-switch:not(.ephox-polish-spin) {
    display: none;
    }
</style>
    @foreach ($data as $item)
    @section('titlee',$item['title'] .' | Sửa nhật kí')
        <div class="container">
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card strpied-tabled-with-hover">
                                    <div class="card-header" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                                        <h3 class="title text-center" style="font-family: monospace; font-size: 2rem;">Chỉnh sửa nhật kí</h3>
                                    </div>
                                    <br>
                                    @if (session('success'))
                                        <div class="alert alert-success text-center" role="alert">
                                            {{ session('success')  }}
                                            <a class="text-light" href="home/detail/{{ $item['id'] }}"> << Quay lại nhật kí</a>
                                        </div>  
                                    @else    
                                    @endif
                                    <div class="card-body table-full-width border ml-3 mr-3">
                                            <form method="post">
                                                    @csrf
                                                    <h5>Tiêu đề</h5>
                                                    <input type="text" name="title"pattern=".{3,155}" title="Tiêu đề ít nhất 3 kí tự và nhiều nhất 255 kí tự" value="{{ $item['title'] }}" class="form-control" placeholder="Nhập tiêu đề của bạn" required>
                                                    <h5>Mô tả ngắn</h5>
                                                    <input type="text" class="form-control" pattern=".{3,255}" title="Mô tả ít nhất 3 kí tự và nhiều nhất 100 kí tự" value="{{ $item['short_content'] }}" name="short_content" placeholder="Mô tả ngắn dưới 100 kí tự" required>
                                                    <br>
                                                    <label for="tieude">Nội dung</label>
                                                    <textarea id="textbox" class="form-control" name="content" style="width: 100%; height: 400px;"><h3 style="text-align:center; color:brown;">{{ $item['content'] }}</h3></textarea> 
                                                    {{-- <textarea name="content" id="content">{{ $item['content'] }}</textarea>
                                                    <script>CKEDITOR.replace('content');</script> --}}
                                                    <br>
                                                    <input type="submit" value="Lưu nhật kí đã sửa đổi" class="btn btn-info btn-fill pull-right">
                                                </form>
                                    </div>
                                    <br>
                                </div>
                                <span class="status"></span>
                            </div>  
                    </div>
                </div>             
            </div>
            <!-- End Content -->
        </div>
    @endforeach
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection