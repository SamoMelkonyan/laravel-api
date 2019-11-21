@extends('layouts.app')
@section('content')
    <div class="container company-edit-container">
        <a href="{{route('companies.index')}}" class="back-link"><i class="fa fa-chevron-circle-left"></i></a>
        <h1 class="text-center mb-3">Edit Company</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ Form::open(array('url' => route('companies.update' , $company->id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data')) }}
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control"  name="name" value="{{$company->name}}" id="name" placeholder="Company name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input  type="text" class="form-control" name="email" value="{{$company->email}}" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <div>
                @if($company->logo)
                    <img src="{{asset("storage/$company->logo")}}" alt="{{$company->name}}">
                @endif
                <input type="file"  name="logo" id="logo" >
                </div>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control"  name="website" value="{{$company->website}}" id="website" placeholder="Website">
            </div>
            <button type="submit" class=" btn btn-success w-100">Edit</button>
        {{ Form::close() }}
    </div>
@endsection
