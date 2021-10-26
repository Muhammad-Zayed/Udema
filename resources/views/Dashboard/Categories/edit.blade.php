@extends('Dashboard.Layouts.layout')

@section('title')
    Edit
    {{$category->name}}
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
        {!! Form::model($category,['route' => ['dashboard.categories.update',$category->id], 'method' => 'PUT' ,'files'=>true]) !!}
        @csrf
        @include('Dashboard.Categories.form')
        {!! Form::close() !!}
    </div>
@endsection
