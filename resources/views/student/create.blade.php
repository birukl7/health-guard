@extends('admin.layout')
@section('title')
    Student
@endsection
<link href="{{asset('css/styles.css')}}" rel="stylesheet" />
@section('content')
<div class="card mb-4 mt-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Add Student
        <a href="{{url('stu')}}" class="float-end">View All</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            {{-- Biruk or Logos, you can add a form here --}}
        </table>
    </div>
</div>

@endsection