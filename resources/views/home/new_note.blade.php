@extends('home.layout')
@section('titlee','Nhật kí mới')
@section('content')
<style>
    .ephox-polish-editor-container.ephox-polish-fullscreen-maximized {
        position: fixed !important;
    }
    .changecolor{
        background: linear-gradient(200deg, #ccc, #9c27b0) !important;
        box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;
        color:#fff;
    }
    .text-black{
        color: #000 !important;
    }
    .breadcrumb-item+.breadcrumb-item::before {
        color: #fff !important;
    }
    .breadcrumb-item{
        margin-bottom:-150px;
    }
    .breadcrumb{
        padding: unset !important;
    }
    .ephox-textbox-font[dir=ltr] .ephox-polish-html-switch-wrapper>.ephox-polish-html-switch:not(.ephox-polish-spin) {
    display: none;
    }
</style>
    <div class="container">
            <div class="content">
                    <div class="container-fluid">
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card strpied-tabled-with-hover">
                                    <div class="card-header changecolor" style="background: linear-gradient(200deg, #ccc, #9c27b0); box-shadow: 0 16px 38px -12px rgba(156, 39, 176, 0.14), 0 4px 25px 0px rgba(156, 39, 176, 0.2), 0 8px 10px -5px rgba(156, 39, 176, 0.12) !important;">
                                        <nav aria-label="breadcrumb" >
                                            <ol class="breadcrumb" style="background:none;">
                                                <li class="breadcrumb-item"><a class="text-black" href="home/redirect-note">Home</a></li>
                                                <li class="breadcrumb-item"><a style="color:#fff;" href="home/create-note">New note</a></li>
                                            </ol>
                                        </nav>
                                        <h3 class="title text-center" style="font-family: monospace; font-size: 2.5rem;">Viết nhật kí mới</h3>
                                    </div>
                                    <div class="card-body table-full-width border ml-3 mr-3">
                                            @if(session('danger'))
                                            <div class="alert alert-success text-center" role="alert">
                                              {{ session('danger')  }}
                                            </div>
                                          @else
                                          @endif
                                        <form method="post">
                                            @csrf
                                            <h5>Tiêu đề</h5>
                                            <input type="text" name="title" pattern="[^ \x22]+.{2,155}" title="Tiêu đề ít nhất 3 kí tự và nhiều nhất 155 kí tự" class="form-control" placeholder="Tiêu đề dưới 155 kí tự" required>
                                            <h5>Mô tả ngắn</h5>
                                            <input type="text" class="form-control" pattern=".{0,255}" title="Mô tả phải ít hơn 100 kí tự" name="short_content" placeholder="Không bắt buộc">
                                            <br>
                                            <label for="tieude">Nội dung</label>
                                            <textarea id="textbox" class="form-control" name="content" style="width: 100%; height: 400px;">Note-Wit</textarea> 
                                            {{-- <textarea class="form-control" aria-label="With textarea" name="content" id="content"></textarea>
                                            <script>CKEDITOR.replace('content');</script> --}}
                                            <br>
                                            <input type="submit" value="Lưu nhật kí" class="btn btn-info btn-fill pull-right">
                                        </form>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <span class="status"></span>  
                    </div>
                </div>
            <!-- End Content -->
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection