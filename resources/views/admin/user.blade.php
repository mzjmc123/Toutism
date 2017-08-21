@extends('layouts.template')
@section('content')
    <title>AdminLTE 2 | User Profile</title>
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
                                            <input type="text" class="form-control" id="username" name="username"
                                                   placeholder="Name">
                                            <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">
                                        <button type="button" onclick='on_button("{{url('admin/user/')}}")'
                                                class="btn btn-block btn-success">Button
                                        </button>
                                        <script>
                                            function on_button(url) {
                                                if ($('#username').val() != "") {

                                                    location.href = url + '/' + $("#username").val();
                                                } else {
                                                    location.href = url;
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="col-xs-1 col-xs-offset-8">
                                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
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
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">GroupName</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Nickname</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column descending" aria-sort="ascending">Created_at</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Updated_at</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Operate</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($user as $users)
                                                    <tr role="row" class="odd">
                                                        <td class="">{{$users->user_id}}</td>
                                                        <td class=""><a href="{{url('admin/profile/'.$users->user_id)}}">{{$users->user_name}}</a></td>
                                                        <td>{{$users->group_name}}</td>
                                                        <td class="">{{$users->user_nickname}}</td>
                                                        <td class="sorting_1">{{$users->created_at}}</td>
                                                        <td>{{$users->updated_at}}</td>
                                                        @if($users->user_state ==1)
                                                            <td>
                                                                <a href="javascript:;" onclick="disable({{$users->user_id}})" style="color: red">Disable</a>&nbsp;|&nbsp;
                                                                <a href="{{url('admin/user/user_group/'.$users->user_id)}}" style="color: red">permissions </a>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a href="javascript:;" onclick="enable({{$users->user_id}})" style="color: #985f0d">Enable</a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
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
        <div class="control-sidebar-bg"></div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add User</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                       placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email<i
                                        class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="user_email" name="user_email"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nickname</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="user_nickname" name="user_nickname"
                                       placeholder="Nickname">
                            </div>
                        </div>

                    </div>
                </div>
                {{--footer--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back
                    </button>
                    <button type="button" onclick="button()" class="btn btn-primary">
                        Button
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <script>
        function disable(user_id) {
            layer.confirm('Are you sure you want to disable this user?', {
                btn: ['Determine', 'Cancel'] //按钮
            }, function () {
                $.post("{{url('admin/status/')}}/" + user_id, {
                    '_method': 'post',
                    '_token': "{{csrf_token()}}"
                }, function ($data) {
                    if ($data.status == 0) {
                        location.href = location.href;
                        layer.msg($data.msg, {icon: 6});
                    } else {
                        layer.msg($data.msg, {icon: 5});
                    }
                });
            }, function () {

            });
        }
        ;

        function enable(user_id) {
            layer.confirm('Are you sure you enable this user?', {
                btn: ['Determine', 'Cancel'] //按钮
            }, function () {
                $.post("{{url('admin/state/')}}/" + user_id, {
                    '_method': 'post',
                    '_token': "{{csrf_token()}}"
                }, function ($data) {
                    if ($data.status == 0) {
                        location.href = location.href;
                        layer.msg($data.msg, {icon: 6});
                    } else {
                        layer.msg($data.msg, {icon: 5});
                    }
                });
            }, function () {

            });
        }
        ;

        function button() {

            if ($("#user_name").val() == "") {
                layer.msg('Please fill in the user name', {icon: 5});
                $("#user_name").focus();
                return false;
            } else if ($("#user_email").val() == "") {
                layer.msg('Please fill in the login mailbox', {icon: 5});
                $("#user_email").focus();
                return false;
            } else {
                $.post("{{url('admin/user/adduser')}}", {
                    '_token': "{{csrf_token()}}",
                    'user_name': $("#user_name").val(),
                    'user_email': $("#user_email").val(),
                    'user_nickname': $("#user_nickname").val(),
                }, function (data) {
                    if (data.status != 1) {
                        layer.msg(data.msg, {icon: 5})
                        //location.href = location.href;
                    } else {
                        layer.msg(data.msg, {icon: 6});
                        location.href = "{{url('admin/user')}}";
                    }
                })
            }
        }
    </script>


@endsection
