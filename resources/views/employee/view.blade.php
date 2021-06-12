@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> {{ __('View Employee Details') }} </strong>
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
                    <form>
                        @csrf                       
                        <div class="form-group required">
                            <label for="formGroupExampleInput">Employee First Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $employee->first_name }}" placeholder="First Name" readonly>
                        </div>
                        <div class="form-group required">
                            <label for="formGroupExampleInput">Employee Last Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $employee->last_name }}" placeholder="Last Name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Company Name</label>
                            <input type="text" name="website" class="form-control" value="{{ $companys->name }}" placeholder="Company Name" readonly>
                        </div>
                        <div class="form-group required">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $employee->email }}" placeholder="Email" readonly>
                        </div>                        
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Phone</label>
                            <input type="text" name="website" class="form-control" value="{{ $employee->phone }}" placeholder="Employee Phone" readonly>
                        </div>
                    </form>      
                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection