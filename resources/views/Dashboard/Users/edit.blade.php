@extends('Dashboard.Layouts.layout')

@section('title')
    Edit
    {{$user->name}}
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
        {!! Form::model($user,['route' => ['dashboard.users.update',$user->id], 'method' => 'PUT' ,'files'=>true]) !!}
        @csrf
        @include('Dashboard.Users.form')
        {!! Form::close() !!}
    </div>
@endsection
