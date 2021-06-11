@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{route('company.create')}}"> 
                        {{ __('Create New Company') }} 
                    </a>
                </div>
                <div class="card-body">     
                    @if($message = Session::get('success'))              
                        <div class="alert alert-success" role="alert">
                            <p>{{$message}}</p>
                        </div>   
                    @endif     

                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach($companys as $company)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->website }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    <form action="{{ route('company.destroy', $company->comp_id) }}" method="POST">
                                        <a class = "btn btn-info" href="{{ route('company.show', $company->comp_id) }}">View</a>
                                        <a class = "btn btn-primary" href="{{ route('company.edit', $company->comp_id) }}">Edit</a>
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>           
                </div>
                {{ $companys->links() }}
            </div>
        </div>
    </div>
</div>
@endsection