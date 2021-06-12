@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success" href="{{route('employee.create')}}"> 
                        {{ __('Create Employee') }} 
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    <form action="{{ route('employee.destroy', $employee->emp_id) }}" method="POST">
                                        <a class = "btn btn-info" href="{{ route('employee.show', $employee->emp_id) }}">View</a>
                                        <a class = "btn btn-primary" href="{{ route('employee.edit', $employee->emp_id) }}">Edit</a>
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>           
                </div>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
@endsection