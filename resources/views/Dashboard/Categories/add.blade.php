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

        {!! Form::open(['route' => 'dashboard.categories.store', 'method' => 'post','files'=>true]) !!}
        @include('Dashboard.Categories.form')
        {!!Form::close()!!}
    </div>
@endsection
