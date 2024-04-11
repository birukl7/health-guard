@extends('admin.layout')
@section('title')
    Psychologists
@endsection
<link href="{{asset('css/styles.css')}}" rel="stylesheet" />
@section('content')
<div class="card mb-4 mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Psychologists
        <a href="{{url('stu/create')}}" class="float-end">Add New</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Experience</th>
                    <th> View </th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Experience</th>
                        <th> View </th>
                        <th>Delete</th>
                    </tr>
                </tr>
            </tfoot>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{$doctor->id}}</td>
                        <td> {{$doctor->name}}</td>
                        <td>{{ $doctor->email}}</td>
                        <td>{{ $doctor->email}}</td>
                        <td><a href="#" class='btn btn-primary'><i class="fa fa-eye" aria-hidden="true"></a></td>
                        <td>
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); confirmDelete('{{ $doctor->id }}');">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            
                            <script>
                                function confirmDelete(doctorId) {
                                    if (confirm('Are you sure you want to delete this user?')) {
                                        // If the user confirms, redirect to the delete route with the blog ID
                                        window.location.href = "{{ route('blog.destroy', ':id') }}".replace(':id', doctorId);
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