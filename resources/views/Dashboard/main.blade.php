@extends('Dashboard.Layouts.layout')

@section('title')
Home Page
@endsection


@section('content')

    <!-- Main charts -->
    <div class="row">
        <div class="col-lg-10">

            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Website Statistics</h4>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline text-center">
                                <li>
                                    <span class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book"></i></span>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Total Courses .</div>
                                    <div class="text-muted">{{ $courses }} Courses .</div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-visitors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-list "></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Total Categories .</div>
                                    <div class="text-muted">{{ $categories }} Category .</div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-sessions"></div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <ul style="margin-right: 15px;" class="list-inline text-center">
                                <li>
                                    <span class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Total Users .</div>
                                    <div class="text-muted"><span class="status-mark border-success position-left">
                                        </span>{{$users}} User .</div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="total-online"></div>
                            </div>
                        </div>
                        <div  class="col-lg-6">
                            <ul style="margin-right: 15px;" class="list-inline text-center">
                                <li >
                                    <span style="border-color: #a3245e ; color:#a3245e"  class="btn border-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-certificate "></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Total Lessons .</div>
                                        </span>{{$lessons}} Lesson .</div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="total-online"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="position-relative" id="traffic-sources"></div>
            </div>
            <!-- /traffic sources -->

        </div>

    </div>
    <!-- /main charts -->

@endsection
