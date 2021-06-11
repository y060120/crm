@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> {{ __('Edit Company Details') }} </strong>
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
                    <form action="{{ route('company.update',$company->comp_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group required">
                            <label class="control-label">Update Company Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $company->name }}" placeholder="Company Name">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Update Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $company->email }}" placeholder="Email">
                        </div>                        
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Update Company Website</label>
                            <input type="text" name="website" class="form-control" value="{{ $company->website }}" placeholder="Company Website">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Company Logo</label>
                            <img src="{{ asset('storage/'. $company->logo) }}" class="img-thumbnail"></img> 
                        </div><br> 
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Update Logo  <span style="color:red;"> Logo must be atleast 100x100 height and width</span></label>
                            <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                        </div>
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