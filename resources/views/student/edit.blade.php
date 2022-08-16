@extends('layout/layout')

@section('title','Manage Student')


@section('container')

<div class="row">
    <h1 class="card-title ml10">Update Student Details</h1>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ url('student/update/'.$result[0]->id) }}" method="post" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{ $result[0]->name }}" name="name" placeholder="Name">
                        @error('name')
                            <p class="error_msg">
                            {{$message}}
                            </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Age</label>
                        <input type="number" class="form-control" id="exampleInputName1" value="{{ $result[0]->age }}" name="age" placeholder="Age">
                        @error('age')
                            <p class="error_msg">
                            {{$message}}
                            </p>
                        @enderror
                    </div>

                        <?php 
                          $classArr  = ["One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten"];
                        ?>
                                        
                    <div class="form-group">
                        <label for="exampleSelectGender">Class</label>
                        <select class="form-control" id="exampleSelectGender" name="class">
                           <option value="">Select Class</option>
                           @foreach($classArr as $list)
                             @if($list == $result[0]->class)
                               {{$selected = "selected"}} 
                            @else
                               {{$selected = ""}} 
                            @endif

                             <option {{ $selected }} value="{{  $list }}">{{  $list }}</option>
                           @endforeach
                        
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