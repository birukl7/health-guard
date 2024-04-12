@extends('admin.layout')
@section('title')
    Blogs
@endsection
<link href="{{asset('css/styles.css')}}" rel="stylesheet" />
@section('content')
<div class="card mb-4 mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Blogs
        <a href="{{url('stu/create')}}" class="float-end">Add New</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Posted By</th>
                    <th>title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th> View </th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <tr>
                        <th>#</th>
                        <th>Posted By</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th> View </th>
                        <th>Delete</th>
                    </tr>
                </tr>
            </tfoot>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>
                            {{ $blog->user->name }}  
                        </td>
                        <td>{{ $blog->title}}</td>
                        <td>{{ $blog->content}}</td>
                        <td>
                            <form action="{{ route('blog.update', $blog->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()">
                                    <option value="Pending" @if($blog->status === 'Pending') selected @endif>Pending</option>
                                    <option value="Approved" @if($blog->status === 'Approved') selected @endif>Approved</option>
                                </select>
                            </form>
                        </td>
                        <td><a href="#" class='btn btn-primary'><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        <td>
                             
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); confirmDelete('{{ $blog->id }}');">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            
                            <script>
                                function confirmDelete(blogId) {
                                    if (confirm('Are you sure you want to delete this blog?')) {
                                        // If the user confirms, redirect to the delete route with the blog ID
                                        window.location.href = "{{ route('blog.destroy', ':id') }}".replace(':id', blogId);
                                    }
                                }
                            </script>
                        </td>
            
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
@endsection