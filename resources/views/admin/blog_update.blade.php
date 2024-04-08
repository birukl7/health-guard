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
                            <form action="/blog/update/{{$blogs->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$blogs->title}}">
                                </div>
                                <div class="form-group">
                                    <label>Posted by</label>
                                    <input type="text" class="form-control" name="user_id" value="{{$blogs->user->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <input type="text" class="form-control" name="content" value="{{$blogs->content}}">
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/blog" class="btn btn-danger">Cancel</a>
                            </form> 
                        </div>
                    </div>   
                </div>    
            </div>    
        </div>  
    </div>
</div>
@endsection