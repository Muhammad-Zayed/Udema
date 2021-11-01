@extends('Dashboard.Layouts.layout')

@section('title')
    Add New Course
@endsection

@section('content')
    <div class="col-md-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif
        <form method="post" action="{{route('dashboard.courses.update' , $course->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('Dashboard.Courses.form')
        </form>
    </div>
@endsection
