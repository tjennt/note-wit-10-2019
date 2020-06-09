<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="NoteWit">
    <meta name="author" content="NoteWit">
    <meta name="keywords" content="NoteWit">

    <!-- Title Page-->
    <title> @yield('title') | NoteWit | Nhật kí miễn phí</title>

    <!-- Icons font CSS-->
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/main.css" rel="stylesheet" media="all">
    <style>
        .alert {
            border: 0;
            border-radius: 10px;
            padding: 20px 15px;
            line-height: 20px;
        }
        .alert.alert-success {
            background-color: brown;
            color: #ffffff;
            text-align: center;
            font-size: 0.8rem;
        }
        .alert.alert-success1 {
            background-color: forestgreen;
            color: #ffffff;
            text-align: center;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
     @yield('user')

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/vendor/datepicker/moment.min.js"></script>
    <script src="assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="assets/js/global.js"></script>

</body>

</html>