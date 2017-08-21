@extends('layouts.template')
@section('content')
<style>
    .row_bot{
        margin-bottom:20px;
    }
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
                    <div class="col-md-6  row_bot">
                                {!! \ConsoleTVs\Charts\Facades\Charts::assets() !!}
                                <center>
                                {!! $chart->render() !!}
                                </center>
                    </div>
                    <div class="col-md-6  row_bot">
                        {{--{!! \ConsoleTVs\Charts\Facades\Charts::assets() !!}--}}
                        <center>
                            {!! $data->render() !!}
                        </center>
                    </div>
                    <div class="col-md-6  row_bot">
                        {{--{!! \ConsoleTVs\Charts\Facades\Charts::assets() !!}--}}
                        <center>
                            {!! $result->render() !!}
                        </center>
                    </div>
                    <div class="col-md-6  row_bot">
                        {{--{!! \ConsoleTVs\Charts\Facades\Charts::assets() !!}--}}
                        <center>
                            {!! $item->render() !!}
                        </center>
                    </div>
                    <div class="col-md-6  row_bot">
                        {{--{!! \ConsoleTVs\Charts\Facades\Charts::assets() !!}--}}
                        <center>
                            {!! $page->render() !!}
                        </center>
                    </div>
                </div>


            </section>
        </div>
            {{--{!! \ConsoleTVs\Charts\Facades\Charts::assets() !!}--}}
            {{--<center>--}}
                {{--{!! $chart->render() !!}--}}
            {{--</center>--}}
        </div>
    </div>
@endsection
