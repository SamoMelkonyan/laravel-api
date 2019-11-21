@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center mb-3">Create Company</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::open(array('url' => route('companies.store'), 'method' => 'POST' , 'enctype' => 'multipart/form-data')) }}
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control"  name="name" value="{{old('name')}}" id="name" placeholder="Company name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input  type="text" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="custom-file" name="logo" id="logo" >
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control"  name="website" value="{{old('website')}}" id="website" placeholder="Website">
        </div>
        <button type="submit" class=" btn btn-success w-100">Create</button>
    {{ Form::close() }}
</div>
@endsection
