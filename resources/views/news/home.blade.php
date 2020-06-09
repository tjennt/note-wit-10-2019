@extends('home.layout')
@section('titlee','Bảng tin')
@section('content')
<div class="row">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Demo CKEditor</title>
   <script src="assets/ckeditor/ckeditor.js"></script>
</head>
<body>
   <h1>Demo CKEditor</h1>
   <form >
      <textarea name="ten" id="ten"></textarea>
      <script>CKEDITOR.replace('ten');</script>
   </form>
</body>
</html>
</div>
@endsection