@extends('layouts.template')
@section('content')
    <title>AdminLTE 2 | User Profile</title>
    <style>
        input[type=checkbox], input[type=radio] {
            margin: 10px 10px;
            width: 15px;
            height: 15px;}
    </style>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.head')
        @include('layouts.left')
        <div class="content-wrapper" style="min-height: 916px;">
            <section class="content-header">
                <h1>
                    Data Tables
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="customer_name" name="customer_name"
                                                   placeholder="Name">
                                            <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="hidden" name="session_id" id="session_id"  value="{{session('user')->user_id}}">
                                        <button type="button" onclick='on_button("{{url('admin/customer/index')}}")'
                                                class="btn btn-block btn-success">Button</button>

                                    </div>
                                    <div class="col-xs-1 col-xs-offset-8">
                                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2" class="table table-bordered table-hover dataTable"
                                                   role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">ID</th>

                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Founder</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column descending" aria-sort="ascending">Created_at</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Updated_at</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Operate</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                            @foreach($customer as $cu)
                                                <tr role="row" class="odd">
                                                    <td class="">{{$cu->customer_id}}</td>
                                                    <td class=""><a href="{{url('admin/profile/')}}">{{$cu->customer_name}}</a></td>
                                                    <td class="">{{$cu->user_name}}</td>
                                                    <td class="">{{$cu->created_at}}</td>
                                                    <td class="sorting_1">{{$cu->updated_at}}</td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#myModal1" href="javascript:;" onclick="Modify({{$cu->customer_id}})" style="color: red">Modify</a>&nbsp;|&nbsp;
                                                        <a href="javascript:;" onclick="del({{$cu->customer_id}})" style="color: red">Delete </a>

                                                    </td>
                                                    {{--<input type="text" name="users_id" id="users_id" value="{{$customer->user_id}}">--}}
                                                    {{--<td>{{$cu->user_id}}</td>--}}
                                                </tr>
                                                @endforeach
                                            <div class="page">
                                                {{$customer->links()}}
                                            </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer_names" name="customer_names" placeholder="Name">
                                <input type="hidden" id="user_id" name="user_id" value="{{session('user')->user_id}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Iphone<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer_iphone" name="customer_iphone" placeholder="Iphone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">City<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer_city" name="customer_city" placeholder="City">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Type<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="radio"  class="customer_type" name="customer_type" value="1">Customer
                                <input type="radio"  class="customer_type" name="customer_type" value="2">Self-support
                                <input type="radio"  class="customer_type" name="customer_type" value="3">Other
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back
                    </button>
                    <button type="button" onclick="button()" class="btn btn-primary">
                        Button
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Modify Customer</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer_name1" name="customer_name" placeholder="Name" disabled>
                                <input type="hidden" id="user_id1" name="user_id" value="">
                                <input type="hidden" id="user_id2" name="user_id" value="{{session('user')->user_id}}">
                                <input type="hidden" id="customer_id1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="customer_email1" name="customer_email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Iphone<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer_iphone1" name="customer_iphone" placeholder="Iphone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">City<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="customer_city1" name="customer_city" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Type<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input  type="radio" class="customer_type" name="customer_type1" value="1" >Customer
                                <input  type="radio" class="customer_type" name="customer_type1" value="2">Self-support
                                <input  type="radio" class="customer_type" name="customer_type1" value="3">Other
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back
                    </button>
                    <button type="button" onclick="mymodify()" class="btn btn-primary">
                        Button
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function button() {
            if ($("#customer_names").val() == "") {
                layer.msg('Please fill in the user name', {icon: 5});
                $("#customer_names").focus();
                return false;
            }else  if ($("#customer_email").val() == "") {
                layer.msg('Please fill in the user email', {icon: 5});
                $("#customer_email").focus();
                return false;
            }else if ($("#customer_iphone").val() == "") {
                layer.msg('Please fill in the user iphone', {icon: 5});
                $("#customer_iphone").focus();
                return false;
            }else if ($("#customer_city").val() == "") {
                layer.msg('Please fill in the user city', {icon: 5});
                $("#customer_city").focus();
                return false;
            }else {
                $.post("{{url('admin/customer/addcustomer')}}", {
                    '_token': "{{csrf_token()}}",
                    'user_id' : $("#user_id").val(),
                    'customer_name': $("#customer_names").val(),
                    'customer_email': $("#customer_email").val(),
                    'customer_iphone': $("#customer_iphone").val(),
                    'customer_city': $("#customer_city").val(),
                    'customer_type'  : $('input[name="customer_type"]:checked').val(),
                }, function (data) {
                    if (data.status != 1) {
                        layer.msg(data.msg, {icon: 5})
                        //location.href = location.href;
                    } else {
                        layer.msg(data.msg, {icon: 6});
                        location.href = "{{url('admin/customer/index')}}";
                    }

                })

            }
                }
                function  Modify(customer_id) {
                    $.get("{{url('admin/customer/modify/')}}/"+customer_id,function(customer) {
                        $("#user_id1").val(customer.user_id);
                        $("#customer_id1").val(customer.customer_id);
                        $("#customer_name1").val(customer.customer_name);
                        $("#customer_email1").val(customer.customer_email);
                        $("#customer_iphone1").val(customer.customer_iphone);
                        $("#customer_city1").val(customer.customer_city);
                        $("input[name=customer_type1][value=" + customer.customer_type + "]").attr("checked", true);
                        }
                    )
                }
                function  mymodify() {
                    var customer_id = $("#customer_id1").val();
                    $.post("{{url('admin/customer/mymodify/')}}/"+customer_id,
                        {'_method': 'post','_token':"{{csrf_token()}}",
                            'user_id' : $("#user_id1").val(),
                            'user_id2' :$("#user_id2").val(),
                            'customer_name' : $("#customer_name1").val(),
                            'customer_email' : $("#customer_email1").val(),
                            'customer_iphone' : $("#customer_iphone1").val(),
                            'customer_city' : $("#customer_city1").val(),
                            'customer_type'  : $('input[name="customer_type1"]:checked').val(),

                        },function (data,sorry) {
                            if(sorry.status == 2){
                                layer.msg(sorry.msg, {icon :5});
                            }
                            if(data.status == 1){
                                layer.msg(data.msg, {icon :6});
                                location.href = location.href;
                            }else{
                                layer.msg(data.msg, {icon :5});
                            }
                        })
                }


        function del(customer_id){
            layer.confirm('Are you sure you want to delete this customer? Once deleted, it will not be resumed？', {
                btn: ['Determine','Cancel'] //按钮
            },function(){
                $.post("{{url('admin/customer/delete/')}}/"+customer_id,
                    {'_method':'delete','_token':"{{csrf_token()}}",
                        'session_id' : $("#session_id").val(),
                    },function(data,sorry){
                    if(sorry.status == 2){
                        layer.msg(sorry.msg,{icon: 5});
                    }
                    if (data.status ==0){
                        location.href = location.href;
                        layer.msg(data.msg,{icon: 6});
                    }else{
                        layer.msg(data.msg,{icon: 5});
                    }
                });
            },function(){
            });
        };
        function on_button(url) {
            if ($('#customer_name').val() != "") {
                location.href = url + '/' + $("#customer_name").val();
            } else {
                location.href = url;
            }
        }
    </script>

@endsection
