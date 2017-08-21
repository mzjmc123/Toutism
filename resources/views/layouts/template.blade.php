<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('public/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="{{asset('public/plugins/datatables/dataTables.bootstrap.css')}}">
    {{--<script src="{{asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>--}}

    {{--<script src="{{asset('public/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>--}}

    <script src="{{asset('public/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('public/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('public/plugins/cdnjs/raphael.min.js')}}"></script>

    <script src="{{asset('public/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/plugins/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('public/plugins/cdnjs/moment.min.js')}}"></script>
    <script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('public/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script src="{{asset('public/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('public/plugins/fastclick/fastclick.js')}}"></script>
    <script src="{{asset('public/dist/js/demo.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="{{asset('public/plugins/fastclick/fastclick.js')}}"></script>
    <script src="{{asset('public/dist/js/app.js')}}"></script>
    <script src="{{asset('public/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('public/dist/js/demo.js')}}"></script>
    <script src="{{asset('public/org/layer/layer.js')}}"></script>
    <style>
        .page {
            width: 400px;
            margin: 0 auto;
            text-align: center;
        }
        .require {
            color: #f00;
        }
    </style>
</head>

@yield('content')

</body>
</html>
