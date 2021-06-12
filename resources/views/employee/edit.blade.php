@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> {{ __('Edit Employee Details') }} </strong>
                    <a style="float: right;" class="btn btn-success" href="{{ url('/employee') }}"> 
                            {{ __('Back') }} 
                    </a>
                </div>
                
                <div class="card-body">  
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input. <br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('employee.update',$employee->emp_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group required">
                            <label class="control-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" placeholder="First Name">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" placeholder="Last Name">
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Company Name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button">Company</button>
                                </div>
                                <select class="custom-select" name="comp_id" id="inputGroupSelect03">
                                    <option selected>Choose...</option>
                                    @foreach($companys as $c) 
                                        @if($employee->comp_id == $c->comp_id)
                                            <option value="{{$c->comp_id}}" selected>{{ $c->name }}</option>
                                        @else    
                                            <option value="{{$c->comp_id}}">{{ $c->name }}</option>
                                        @endif    
                                    @endforeach                                     
                                </select>
                                </div>
                            </div>

                        <div class="form-group required">
                            <label class="control-label">Email </label>
                            <input type="text" name="email" class="form-control" value="{{ $employee->email }}" placeholder="Email">
                        </div>                       
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Phone</label>
                            <input type="number" name="phone" class="form-control" value="{{ $employee->phone }}" placeholder="Phone No.">
                        </div><br>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection