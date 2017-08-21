@extends('layouts.template')
@section('content')
    <title>AdminLTE 2 | User Profile</title>
    <style>
        .page{
            width:400px;
            margin:0 auto;
            text-align:center;
        }
    </style>
    {{--<link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>--}}
    {{--<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/default.css')}}">--}}
    {{--<link href="{{asset('public/bootstrap/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />--}}
    {{--<script src="{{asset('public/bootstrap/js/fileinput.js')}}" type="text/javascript"></script>--}}
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    @include('layouts.head')
    <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.left')

        <div class="content-wrapper" style="min-height: 916px;">
            <!-- Content Header (Page header) -->
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
                                            <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Name">
                                            <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">
                                        <button type="button" onclick='on_button("{{url('admin/auth/index')}}")' class="btn btn-block btn-success" >Button</button>
                                        <script>
                                            function on_button (url) {
                                                if($('#group_name').val() != "") {

                                                    location.href = url + '/' + $("#group_name").val();
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
                            {{--<div class="col-xs-1" col-xs-offset-6>--}}
                            {{--<button type="button" class="btn btn-block btn-primary" >--}}
                            {{--Add--}}
                            {{--</button>--}}
                            {{--</div>--}}
                            <!-- Modal -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">GroupID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">GroupName</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">GroupRemarks</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column descending" aria-sort="ascending">Created_at</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Updated_at</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Operate</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($group as $groups)
                                                    <tr role="row" class="odd">
                                                        <td class="">{{$groups->group_id}}</td>
                                                        <td class=""><a href="{{url('admin/profile/'.$groups->group_id)}}">{{$groups->group_name}}</a></td>
                                                        <td class="">{{$groups->group_remarks}}</td>
                                                        <td class="sorting_1">{{$groups->created_at}}</td>
                                                        <td>{{$groups->updated_at}}</td>
                                                        @if($groups->group_status ==1)
                                                            <td>
                                                                <a href="javascript:;" onclick="disable({{$groups->group_id}})" style="color: red">Disable</a>&nbsp;|&nbsp;  <a href="javascript:;" data-toggle="modal" data-target="#myModal1" onclick="Modify({{$groups->group_id}})" style="color: red">Modify</a>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a href="javascript:;" onclick="enable({{$groups->group_id}})" style="color: #985f0d">Enable</a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="page">
                                        {{$group->links()}}
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

    <style>
        .require{
            color:#f00;
        }
    </style>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Group</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="groupname" name="group_name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Remarks<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="groupremarks" name="group_remarks" placeholder="Remarks">
                            </div>
                        </div>
                    </div>
                </div>
                {{--footer--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back
                    </button>
                    <button type="button" onclick="validateForm()" class="btn btn-primary">
                       Button
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
        {{--</form>--}}
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Modify Group</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Name<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="hidden" id="group_id" name="group_id" value="">
                                <input type="text" class="form-control" id="groupname1" name="group_name" placeholder="Name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Remarks<i class="require">*</i></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="groupremarks1" name="group_remarks" placeholder="Remarks" value="">
                            </div>
                        </div>
                    </div>
                </div>
                {{--footer--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back
                    </button>
                    <button type="button" onclick="ModifyForm()" class="btn btn-primary">
                        Button
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
        {{--</form>--}}
    </div>
        <script>
            function disable(group_id){
                layer.confirm('Are you sure you want to disable this user?', {
                    btn: ['Determine','Cancel'] //按钮
                },function(){
                    $.post("{{url('admin/auth/status/')}}/"+group_id,{'_method':'post','_token':"{{csrf_token()}}"},function($data){
                        if ($data.status ==0){
                            location.href = location.href;
                            layer.msg($data.msg,{icon: 6});
                        }else{
                            layer.msg($data.msg,{icon: 5});
                        }
                    });
                },function(){

                });
            };

            function enable(group_id){
                layer.confirm('Are you sure you enable this user?', {
                    btn: ['Determine','Cancel'] //按钮
                },function(){
                    $.post("{{url('admin/auth/state/')}}/"+group_id,{'_method':'post','_token':"{{csrf_token()}}"},function($data){
                        if ($data.status ==0){
                            location.href = location.href;
                            layer.msg($data.msg,{icon: 6});
                        }else{
                            layer.msg($data.msg,{icon: 5});
                        }
                    });
                },function(){

                });
            };

            function validateForm(){
                if($('#groupname').val() == ""){
                    layer.msg('The permission group name must be filled in',{icon: 5});
                    $('#groupname').focus();
                    return false;
                }else if($('#groupremarks').val() == ""){
                    layer.msg('Permissions group, note name, fill in',{icon: 5});
                    $('#groupremarks').focus();
                    return false;
                }else {
                    $.post("{{url('admin/auth/addgroup')}}",{
                        '_token' : "{{csrf_token()}}",
                        'group_name' : $('#groupname').val(),
                        'group_remarks' : $('#groupremarks').val(),
                    },function (data) {
                        if(data.status != 1){
                            layer.msg(data.msg,{icon:5});
                            //location.href = location.href;
                        }else {
                            layer.msg(data.msg,{icon:6});
                            location.href = "{{url('admin/auth/index')}}";
                        }
                    })
                }
            }
            function Modify(group_id) {
                    $.get("{{url('admin/auth/modify/')}}/"+group_id,function (group) {
                        $('#group_id').val(group.group_id);
                       $('#groupname1').val(group.group_name);
                       $('#groupremarks1').val(group.group_remarks);
                    })
            }
            
            function ModifyForm() {
                var group_id = $("#group_id").val();
                $.post("{{url('admin/auth/ModifyForm/')}}/"+group_id,
                        {'_method':'post', '_token':"{{csrf_token()}}",
                         'group_name' : $('#groupname1').val(),
                         'group_remarks' : $('#groupremarks1').val(),
                    },function (data) {
                    if(data.status == 1){
                        layer.msg(data.msg,{icon :5});
                    }else if (data.status ==3){
                        layer.msg(data.msg, {icon :5});
                    }else {
                        layer.msg(data.msg, {icon :6});
                        location.href = "{{url('admin/auth/index')}}";
                    }
                })
            }
        </script>
@endsection
