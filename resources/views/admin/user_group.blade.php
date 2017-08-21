@extends('layouts.template')
@section('content')
    <title>AdminLTE 2 | User Profile</title>
    <style>
        .form-groups{
            width:600px;
            height:40px;
            margin:0 auto;
        }
        .require{
            color:#f00;
        }
        .table-bordered {
            border: none;
        }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td,            .table-bordered>tfoot>tr>td {
            border: none;
        }
        .line{
            margin-top:16px;
            border:1px #F4F4F4 solid;
        }
        .user_tab{
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            padding:15px;
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
                                <form  action="{{url('admin/user/group')}}" class="modal-body" method="post" style="margin-bottom:20px;">
                                    {{csrf_field()}}
                                    <div class="form-horizontal">
                                        <div  class="form-groups">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Name<i class="require">*</i></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" value="{{$user->user_name}}" disabled >
                                                        <input type="hidden"  name="user_name"  value="{{$user->user_name}}" >
                                                    </div>
                                            </div>
                                        </div>
                                        <div  class="form-groups">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Email<i class="require">*</i></label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email" value="{{$user->user_email}}" disabled>
                                                    <input type="hidden"  name="user_email" value="{{$user->user_email}}" >
                                                    <input type="hidden"  name="user_id" value="{{$user->user_id}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="form-groups">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Group<i class="require">*</i></label>
                                                <div class="col-sm-10">
                                                    @foreach($group as $groups)
                                                    <p  style="margin-top:10px;">
                                                        <input type="checkbox" name="check[]" value="{{$groups->group_id}}">{{$groups->group_name}}
                                                    </p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="form-groups">
                                            <div class="form-group">
                                                <div class="col-sm-7 col-sm-offset-2" >
                                                    <button type="submit" class="btn btn-success">Back</button>
                                                </div>
                                                {{--<label for="inputEmail3" class="col-sm-2 control-label">Group<i class="require">*</i></label>--}}
                                                <div class="col-sm-3">

                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div style="  position:absolute;top:700px;width:100%">
                            <section class="content-header">
                                <h1>
                                    Data Tables
                                    <small>advanced tables</small>
                                </h1>
                            </section>
                            <div class="bs-example user_tab" data-example-id="bordered-table" style="margin-top:40px">

                                <table class="table table-bordered">
                                    <tr>
                                        <td width="8%"><b>Name:</b></td>
                                        <td><div class="line"></div></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td width="8%"><b>Email:</b></td>
                                        <td><div class="line"></div></td>
                                    </tr>
                                    <tr>
                                        <td width="8%"><b>Group:</b>
                                        </td>
                                        <td><div class="line"></div></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="control-sidebar-bg"></div>
    </div>

@endsection
