@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> {{ __('View Company Details') }} </strong>
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
                    <form>
                        @csrf                       
                        <div class="form-group required">
                            <label for="formGroupExampleInput">Company Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $company->name }}" placeholder="Company Name" readonly>
                        </div>
                        <div class="form-group required">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $company->email }}" placeholder="Email" readonly>
                        </div>                        
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Company Website</label>
                            <input type="text" name="website" class="form-control" value="{{ $company->website }}" placeholder="Company Website" readonly>
                        </div><br> 
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Company Logo</label>
                            <img src="{{ asset('storage/'. $company->logo) }}" class="img-thumbnail"></img> 
                        </div><br> 
                         
                    </form>      
                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection