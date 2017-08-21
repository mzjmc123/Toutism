@extends('layouts.template')
@section('content')
    <style>
        .add_tr{
            text-align:center;
        }
        .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: none;
        }
        .fl{
            float:left;
        }
        .user_time{
            margin:0 10px 10px 0;
            border-radius:3px;
            width:25px;
            height:25px;
            text-align:center;
            line-height:25px;
            border:1px #ccc solid
        }
        .user_time :hover{
            background:#1f648b;
        }
    </style>

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
                                <div class="tab-pane" id="settings">
                                    @if(session('msg'))
                                        <p style="color:red">{{session('msg')}}</p>
                                    @endif
                                    <form class="form-horizontal" action="{{url('admin/project/mofifyform/'.$project->project_id)}}" method="post"  style="width:75%;margin:0 auto">
                                        <input type="hidden" name="session_id" id="session_id" value="{{session('user')->user_id}}">
                                        <input type="hidden" name="user_id" id="user_id" value="{{$project->user_id}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="inputName"  class="col-sm-2 control-label">Project Name</label>

                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="project_name" value="{{$project->project_name}}" id="project_name" placeholder="Name" disabled >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName"  class="col-sm-2 control-label">Customer Name</label>
                                            <div class="col-sm-4">
                                                <select class="form-control"  name="customer_id" disabled>
                                                    <option value="0" selected="selected">Please Select</option>
                                                    @foreach($customer as $cu)
                                                        <option value="{{$cu->customer_id}}"
                                                        @if($cu->customer_id == $project->customer_id) selected @endif>{{$cu->customer_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{--<div class="col-sm-4">--}}
                                            {{--<input type="text" class="form-control" name="project_name" value="" id="project_name" placeholder="Name" >--}}
                                            {{--</div>--}}
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Delivery Mode<i class="require">*</i></label>
                                            <div class="col-sm-10">
                                                <div class="bs-example" data-example-id="bordered-table">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/cpm.png')}}" width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="CPM" @if(strstr($project->delivery_mode,'CPM'))checked @endif > CPM </p>
                                                            </td>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/cpc.png')}}"  width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="CPC "@if(strstr($project->delivery_mode,'CPC'))checked @endif > CPC </p>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/cpa.png')}}"  width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="CPA "@if( strstr($project->delivery_mode,'CPA'))checked @endif > CPA </p>
                                                            </td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/pfp.png')}}" width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="PFP "@if(strstr($project->delivery_mode,'PFP'))checked  = checked @endif > PFP </p>
                                                            </td>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/cps.png')}}"  width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="CPS" @if(strstr($project->delivery_mode,'CPS'))checked @endif > CPS</p>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/cpl.png')}}"  width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="CPL"@if(strstr($project->delivery_mode,'CPL'))checked @endif > CPL</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/cpr.png')}}" width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="CPR"@if(strstr($project->delivery_mode,'CPR'))checked @endif > CPR</p>
                                                            </td>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/mzjmc.png')}}"  width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="Full_screen_launch"@if(strstr($project->delivery_mode,'Full_screen_launch'))checked @endif > Full Screen Launch</p>
                                                            <td class="add_tr">
                                                                <p><img src="{{asset('public/image/mzjmc.png')}}"  width="50%"></p>
                                                                <p><input type="checkbox" name="check[]" value="Bottom_delivery"@if(strstr($project->delivery_mode,'Bottom_delivery'))checked @endif > Bottom Delivery</p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Delivery Time<i class="require">*</i></label>
                                            <script src="{{asset('public/js/date/WdatePicker.js')}}"></script>
                                            <div class="row">
                                                <div class="col-xs-3">

                                                    <input type="text" name="start_time" value="{{$project->start_time}}" class="Wdate form-control" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})">

                                                </div>
                                                <div class="col-xs-3">

                                                    <input class="Wdate  form-control" name="end_time" value="{{$project->end_time}}" type="text" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})">

                                                </div>
                                                <div class="col-xs-3">
                                                </div>
                                            </div>
                                            {{--<div class="form-group">--}}
                                            {{--<label for="inputEmail3" class="col-sm-2 control-label">Delivery Type<i class="require">*</i></label>--}}
                                            {{--<div class="col-sm-10">--}}
                                            {{--<input type="radio"  id="full" name="delivery_type"  value="1" >Full Time Delivery--}}
                                            {{--<input type="radio"  id="custom" name="delivery_type" value="2" >Interval Delivery--}}
                                            {{--</div>--}}
                                            {{--</div>--}}

                                            <div class="form-group" id="week">
                                                <div class="col-sm-2 control-label"></div>
                                                {{--<div class="col-sm-10">--}}
                                                {{--<div class="row">--}}
                                                {{--@foreach($week as $k =>$hours)--}}
                                                {{--<div class="col-sm-1">Week{{$k+1}}:</div>--}}
                                                {{--<div class="col-sm-1">--}}
                                                {{--<input type="checkbox" id="checkbox" name="add_type[]" value="">--}}
                                                {{--</div>--}}
                                                {{--@foreach($hours as $hour)--}}
                                                {{--<div class="fl">--}}
                                                {{--<div class="user_time"  >{{$hour}}</div>--}}
                                                {{--</div>--}}
                                                {{--@endforeach--}}
                                                {{--@endforeach--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-2 control-label">Budget Money<i class="require">*</i></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="project_money"  value="{{$project->budget_money}}" id="project_money" placeholder="money" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-2 control-label">Remkres<i class="require">*</i></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="project_remkres" value="{{$project->project_remarks}}" id="project_remkres" placeholder="remkres" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-10">
                                                    <div class="col-sm-2">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <button type="submit"   class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection
