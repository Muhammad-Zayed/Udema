@extends('Dashboard.Layouts.layout')

@section('title')
    Show All Users
@endsection

@section('content')
    <!-- Basic initialization -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">All Users Operations</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            You Can Show All Users And performs All operations like Edit And Delete .
        </div>

        <table class="table datatable-button-init-basic">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <span>
                            <img src="{{ getimg($user->image)}}" 
                            class="img-circle img-sm" alt="">
                        </span>

                        <a href="">{{$user->name}}</a>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td><span
                            class="label label-{{$user->role=="admin" ? "success" : "default"}}">{{$user->role}}</span>
                    </td>
                    <td>
                        <a href="{{route('dashboard.users.edit',$user->id)}}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <form style="display: inline" action="{{route('dashboard.users.destroy' , $user->id)}}"
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
        {{ $users->links() }}
    </div>
    <!-- /basic initialization -->





@endsection
