@extends('layouts.app')
@section('content')

    <div class="container employees-container">
        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        <a class="btn btn-success mb-1" href="{{route('employees.create')}}">Create Employee</a>
        <div class="table-responsive">
        <table class="table table-striped table-dark text-center text-nowrap">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Company</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->company ? $employee->company->name : ''}}</td>
                        <td><a href="mailto:{{$employee->email}}">{{$employee->email}}</a></td>
                        <td><a href="tel:{{$employee->phone}}">{{$employee->phone}}</a></td>
                        <td class="actions">
                            <a href="{{route('employees.show' , $employee->id)}}"><i class="fa fa-eye"></i></a>
                            <a href="{{route('employees.edit' , $employee->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            {{ Form::open(array('url' => route('employees.destroy' , $employee->id), 'method' => 'DELETE')) }}
                            <button onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i>
                            </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="d-flex justify-content-center">
            {{$employees->links()}}
        </div>
    </div>
@endsection
