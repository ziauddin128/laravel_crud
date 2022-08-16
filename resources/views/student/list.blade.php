@extends('layout/layout')

@section('title','Student List')

@section('container')

<div class="card">
<div class="card-body">
    <h5 class="text-center text-primary">{{ session('msg2') }}</h5>
<h4 class="card-title">Student's table</h4>
<a href="{{ url('student/add') }}" class="btn btn-primary mb-4">Add Student</a>
<div class="row">
<div class="col-12">
<div class="table-responsive">
    <table id="order-listing" class="table">
        <thead>
            <tr>
                <th>Sl #</th>
                <th>Name</th>
                <th>Age</th>
                <th>Class</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i =1 ?>
            @foreach($result as $list)
            <tr>
                <td>{{$i}}</td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->age }}</td>
                <td>{{ $list->class }}</td>
                <td><img src="{{ asset('storage/students/'.$list->image) }}" alt=""></td>
                <td>
                    <a href="{{ url('student/edit/'.$list->id) }}" class="btn btn-primary text-white py-2">Edit</a>
                    <a  href="{{ url('student/delete/'.$list->id) }}" class="btn btn-danger text-white py-2">Delete</a>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>

@endsection