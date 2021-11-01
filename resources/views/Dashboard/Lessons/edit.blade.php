@extends('Dashboard.Layouts.layout')

@section('title')
    Edit {{ $lesson->name }} Lesson .
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
        <form method="post" action="{{route('dashboard.lessons.update' , $lesson->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('Dashboard.Lessons.form')
        </form>
    </div>
@endsection
