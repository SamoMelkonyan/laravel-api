@extends('layouts.app')
@section('content')
    <div class="container employee-show-container">
        <a href="{{route('employees.index')}}" class="back-link"><i class="fa fa-chevron-circle-left"></i></a>
        <h1 class="text-center mb-3">{{$employee->first_name}} {{$employee->last_name}}</h1>
        <div class="text-center">Company : {{$employee->company ? $employee->company->name : ''}}</div>
        <div class="text-center">Email : <a href="mailto:{{$employee->email}}">{{$employee->email}}</a></div>
        <div class="text-center">Phone : <a href="tel:{{$employee->phone}}">{{$employee->phone}}</a></div>
    </div>
@endsection
