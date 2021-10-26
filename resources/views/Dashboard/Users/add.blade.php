@extends('Dashboard.Layouts.layout')

@section('title')
    Create New User
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

        {!! Form::open(['route' => 'dashboard.users.store', 'method' => 'post','files'=>true]) !!}
        @include('Dashboard.Users.form')
        {!!Form::close()!!}
    </div>
@endsection
