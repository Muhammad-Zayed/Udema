@extends('Dashboard.Layouts.layout')

@section('title')
    Create New Category
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
        <form method="post" action="{{route('dashboard.courses.store')}}" enctype="multipart/form-data">
            @csrf
            @include('Dashboard.Courses.form')
        </form>
    </div>
@endsection
