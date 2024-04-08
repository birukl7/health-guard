@extends('admin.dashbord')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Info</h3>
                </div> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/user/update/{{$users->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$users->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($users->hasRole($role->name)) selected @endif>{{$role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/user" class="btn btn-danger">Cancel</a>
                            </form> 
                        </div>
                    </div>   
                </div>    
            </div>    
        </div>  
    </div>
</div>
@endsection