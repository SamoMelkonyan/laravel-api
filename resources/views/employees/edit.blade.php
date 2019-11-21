@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mb-3">Edit Employee</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ Form::open(array('url' => route('employees.update' , $employee->id), 'method' => 'PUT')) }}
        <div class="form-group">
            <label for="first_name">First Name *</label>
            <input type="text" class="form-control"  name="first_name" value="{{$employee->first_name}}" id="first_name" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name *</label>
            <input type="text" class="form-control"  name="last_name" value="{{$employee->last_name}}" id="last_name" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="company">Company</label>
            <select class="form-control" name="companies_id" id="company">
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}" {{$company->id == $employee->companies_id ? 'selected' : ''}}>{{$company->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input  type="text" class="form-control" name="email" value="{{$employee->email}}" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control"  name="phone" value="{{$employee->phone}}" id="website" placeholder="Phone">
        </div>
        <button type="submit" class=" btn btn-success w-100">Edit</button>
        {{ Form::close() }}
    </div>
@endsection
