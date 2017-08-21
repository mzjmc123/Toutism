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
                                            <input type="text" class="form-control" id="project_name" name="project_name"
                                                   placeholder="Name">
                                            <div class="input-group-addon"><i class="glyphicon glyphicon-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-1">
                                        <button type="button" onclick='on_button("{{url('admin/project/index')}}")'
                                                class="btn btn-block btn-success">Button
                                        </button>
                                        <script>
                                            function on_button(url) {
                                                if ($('#project_name').val() != "") {
                                                    location.href = url + '/' + $("#project_name").val();
                                                } else {
                                                    location.href = url;
                                                }
                                            }
                                        </script>
                                    </div>
                                    <div class="col-xs-1 col-xs-offset-8">
                                        <input type="hidden" name="session_id" id="session_id" value="{{session('user')->user_id}}">
                                        <button type="button" class="btn btn-block btn-primary" onclick="buttons()">Add</button>
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
                                                @foreach($project as $projects)
                                                    <tr role="row" class="odd">
                                                        <td class="">{{$projects->project_id}}</td>
                                                        <td class=""><a href="{{url('admin/profile/')}}">{{$projects->project_name}}</a></td>
                                                        <td> {{$projects->user_name}} </td>
                                                        <td class="">{{$projects->created_at}}</td>
                                                        <td class="sorting_1">{{$projects->updated_at}}</td>
                                                        <td>
                                                            {{--<a  href="javascript:;" onclick="Modify({{$projects->project_id}})" style="color: red">Modify</a>--}}
                                                            <a href="javascript:;" onclick="del({{$projects->project_id}})" style="color: red">Delete </a>&nbsp;|&nbsp;

                                                            <a href="{{url('admin/project/modify/'.$projects->project_id,$projects->user_id)}}" style="color: red">Modify</a>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                <div class="page">
                                                    {{$project->links()}}
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
    <script>
        function buttons() {
            var user_id = $("#session_id").val();
            location.href = "{{url('admin/project/add/')}}/"+user_id;
        }

        {{--function Modify(project_id) {--}}
            {{--$.get("{{url('admin/project/modify/')}}/"+project_id,'user_id':$("").val());--}}
        {{--}--}}
    </script>

@endsection
