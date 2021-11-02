@extends('Dashboard.Layouts.layout')

@section('title')
    Enrollment Requests .
@endsection

@section('content')
    <!-- Basic initialization -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">All Enrollment Requests</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
           Change Status Of Enrollment Request 
        </div>
        <hr>
    @if($enrolls->isNotEmpty())
        <table class="table datatable-button-init-basic">
            <thead>
            <tr>
                <th>User Name</th>
                <th>Course Name</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enrolls as $enroll)
                <tr>
                    <td>
                        {{$enroll->user->name}}
                    </td>
                    <td>{{ $enroll->course->name }}</td>
                    
                    <td><span
                        class="label label-{{$enroll->is_confirmed ? "success" : "default"}}">{{$enroll->is_confirmed ? "Confirmed" : "Pending"}}</span>
                    </td>

                    <td>

                        <form style="display: inline" action="{{route('dashboard.courses_enrolls.update' , $enroll->id)}}"
                            method="post">
                          @csrf
                          @method('put')
                          <input class="btn btn-primary" type="submit" value="Change">
                        </form>

                        <form style="display: inline" action="{{route('dashboard.courses_enrolls.destroy' , $enroll->id)}}"
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
                <h3 style="margin-left:20px;">No Requests Available</h3>
            </div>
        @endif
    </div>
    {{ $enrolls->links() }}

    <!-- /basic initialization -->
</div>

@endsection
