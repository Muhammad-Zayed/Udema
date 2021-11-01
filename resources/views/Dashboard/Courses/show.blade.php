@extends('Dashboard.Layouts.layout')

@section('title')
    Course Lessons Details
@endsection

@section('content')
    <!-- Basic initialization -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Lessons Details For {{ $course->name }} And It's Operations</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            You Can Show All Lessons And performs All operations like Edit And Delete
        </div>
        <a href="{{ route('dashboard.lessons.create',$course->id) }}">
            <h4 style="margin-left: 20px" ><i class="icon-add"></i> Add New Lesson</h4>
        </a> 
        <hr>
    @if($lessons!=null)
        <table class="table datatable-button-init-basic">
            <thead>
            <tr>
                <th>Name</th>
                <th>URL</th>
                <th>Duraion</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lessons as $lesson)
                <tr>
                    <td>
                        {{$lesson->name}}
                    </td>
                    <td><a target="_blank" href="{{$lesson->url}}">{{$lesson->url}}</a></td>
                    <td>{{$lesson->duration}} min .</td>

                    <td>
                        <a href="{{route('dashboard.lessons.edit',$lesson->id)}}">
                            <botton class="btn btn-primary">Edit</botton>
                        </a>
                        <form style="display: inline" action="{{route('dashboard.lessons.destroy' , $lesson->id)}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
        @else
            <div>
                <h3 style="margin-left:20px;">No Lessons Available For This Course</h3>
            </div>
        @endif
        {{ $lessons->links() }}

    </div>
    <!-- /basic initialization -->


    <!-- Basic initialization -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Reviews Details For {{ $course->name }} Course</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            All Reviews For This Course
        </div>
        <hr>
    @if(($course->reviews->isNotEmpty()))
        <table class="table datatable-button-init-basic">
            <thead>
            <tr>
                <th>User Name</th>
                <th>Comment</th>
                <th>Review</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($course->reviews as $review)
                <tr>
                    <td>
                        {{$review->user->name}}
                    </td>
                    <td>{{ Str::limit($review->comment , 20)}}</td>
                    <td>{{ $review->rate}}</td>

                    <td>
                        <form style="display: inline" action="{{route('dashboard.lessons.destroy' , $lesson->id)}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
        @else
            <div>
                <h3 style="margin-left:20px;">No Reviews Available For This Course</h3>
            </div>
        @endif
    </div>




@endsection
