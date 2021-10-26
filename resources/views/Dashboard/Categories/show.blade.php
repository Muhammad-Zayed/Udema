@extends('Dashboard.Layouts.layout')

@section('title')
    Show All Users
@endsection

@section('content')
    <h4 class="content-group text-semibold">
        Courses List - <a href="{{route('dashboard.courses.create' , $category->id)}}"><i class="icon-add"></i> Add New
            Course </a>

        <small class="display-block">All Available Courses For {{$category->name}} Category .</small>
    </h4>
    <div class="row">
        @forelse($category->courses as $course)
            <div class="col-lg-3 col-md-6">
                <div class="thumbnail no-padding">
                    <div class="thumb">
                        <img src="{{getimg($course->image)}}" alt="">
                        <div class="caption-overflow"></div>
                    </div>

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
            <h2>No Categories Available ! </h2>
        @endforelse
    </div>
@endsection
