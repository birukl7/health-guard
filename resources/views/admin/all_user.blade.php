@extends('admin.dashboard')
@section('content')
    @if(session('status'))
    <div class="alert alert-success" role="alert">
    {{session('status')}}
    </div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{$user->id}}</td>
                    <td>
                        <img src="{{ $user->image }}" alt="User Image" width="50" height="50">
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {{$role}}
                        @endforeach
                    </td>
                    <td> 
                        <a href="/user/update/{{$user->id}}" class="btn btn-success">Edit</a>    
                    </td>
                    <td> 
                        <form action="/user/delete/{{$user->id}}" method="post">
                            @csrf
                            @method('Delete') 
                            <button type="submit" class="btn btn-danger">Delete</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>  
    </table>
@endsection