@extends('layout/layout')
@section('title','Manage Student')

@section('container')

<div class="row">
    <h1 class="card-title ml10">Add New Student</h1>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ url('student/submit') }}" method="post" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{ old('name') }}" name="name" placeholder="Name">
                        @error('name')
                            <p class="error_msg">
                            {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Age</label>
                        <input type="number" class="form-control" id="exampleInputName1" value="{{ old('age') }}" name="age" placeholder="Age">
                        @error('age')
                            <p class="error_msg">
                            {{$message}}
                            </p>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleSelectGender">Class</label>
                        <select class="form-control" id="exampleSelectGender" name="class">
                            <option value="">Select Class</option>
                            <option value="One">One</option>
                            <option value="Two">Two</option>
                            <option value="Three">Three</option>
                            <option value="Four">Four</option>
                            <option value="Five">Five</option>
                            <option value="Six">Six</option>
                            <option value="Seven">Seven</option>
                            <option value="Eight">Eight</option>
                            <option value="Nine">Nine</option>
                            <option value="Ten">Ten</option>
                        </select>
                        @error('class')
                            <p class="error_msg">
                            {{$message}}
                            </p>
                        @enderror
                    </div>
                  
                    <div class="form-group">
                        <label for="exampleInputCity1">Image</label>
                        <input type="file" class="form-control" id="exampleInputCity1" name="image">
                        @error('image')
                            <p class="error_msg">
                            {{$message}}
                            </p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection