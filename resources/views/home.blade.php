@extends('layouts.app')

@section('content')
<div class="container home-container">
    <div class="row">
        <div class="col-6">
            <a class="w-100 btn btn-success p-5" href="{{route('companies.index')}}">Companies</a>
        </div>
        <div class="col-6">
            <a class="w-100 btn btn-info text-light p-5" href="{{route('employees.index')}}">Employees</a>
        </div>
    </div>
</div>
<style>
    .home-container a{
        font-size: 2em !important;
    }
</style>
@endsection
