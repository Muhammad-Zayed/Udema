@extends('Dashboard.Layouts.layout')

@section('title')
    Add  New Lesson To {{ $course->name }} Course .
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
        <form method="post" action="{{route('dashboard.lessons.store' , $course->id)}}" enctype="multipart/form-data">
            @csrf
            @include('Dashboard.Lessons.form')
        </form>
    </div>
@endsection
