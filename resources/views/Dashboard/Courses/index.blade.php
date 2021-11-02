@extends('Dashboard.Layouts.layout')

@section('title')
    All Courses
@endsection

@section('content')
    <div style="margin-bottom:20px; ">
        <select onchange="myFunction()" style="padding:0 0 0 5px" id="choose_category" class="form-control form-control-sm">
            <option selected value="0" >All</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div id="change_category">
        <div class="row">
            @forelse($courses as $course)
                <div class="col-lg-3 col-md-6">
                    <div class="thumbnail no-padding">
                        <a href="{{ route('dashboard.courses.show' , $course->id) }}">
                            <div class="thumb">
                                <img src="{{getimg($course->image)}}" alt="">
                                <div class="caption-overflow">
                                    <h3 style="margin-top:100px">View Course</h3>
                                </div>
                            </div>    
                        </a>
                        
                        <div class="caption text-center">
                            <h6 class="text-semibold no-margin">{{$course->name}}
                                <small class="display-block">
                                    Total Duration
                                    ( {{$course->total_duration / 60 . ' H - ' . $course->total_duration %60 .' Sec'}} )
                                </small>
                                <small class="display-block">
                                    Total Lessons
                                    ( {{$course->lessons->count()}} )
                                </small>
                            </h6>
                            <a href="{{ route('dashboard.courses.show' , $course->id) }}">Course Details</a>
                            <div style="margin-top: 10px">
                                <form style="display: inline" method="POST"
                                      action="{{route('dashboard.courses.destroy' , $course->id)}}">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" value="Delete" type="submit"/>
                                </form>
    
                                <a class="btn btn-primary"
                                   href="{{route('dashboard.courses.edit' , $course->id)}}">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2 style="margin-left:10px ">No Courses Available ! </h2>
            @endforelse
        </div>
    </div>

@endsection
