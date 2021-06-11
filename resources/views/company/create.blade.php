@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> {{ __('Add new Company') }} </strong>
                    <a style="float: right;" class="btn btn-success" href="{{ url('/company') }}"> 
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
                    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group required">
                            <label class="control-label">Company Name</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Company Name">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Email </label>
                            <input type="text" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Company Logo <span style="color:red;"> Logo must be atleast 100x100 height and width</span></label>
                            <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Company Website</label>
                            <input type="text" name="website" class="form-control" id="formGroupExampleInput2" placeholder="Company Website">
                        </div><br>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection