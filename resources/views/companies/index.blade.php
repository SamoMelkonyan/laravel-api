@extends('layouts.app')
@section('content')
    <div class="container companies-container">
        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        <a class="btn btn-success mb-1" href="{{route('companies.create')}}">Create Company</a>
        <div class="table-responsive">
        <table class="table table-striped table-dark text-center text-nowrap">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Logo</td>
                    <td>Website</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->name}}</td>
                        <td><a href="mailto:{{$company->email}}">{{$company->email}}</a></td>
                        <td>
                            @if($company->logo)
                                <img src="{{asset("storage/$company->logo")}}" alt="{{$company->name}}">
                            @endif
                        </td>
                        <td><a href="{{$company->website}}" target="_blank">{{$company->website}}</a></td>
                        <td class="actions">
                            <a href="{{route('companies.show' , $company->id)}}"><i class="fa fa-eye"></i></a>
                            <a href="{{route('companies.edit' , $company->id)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            {{ Form::open(array('url' => route('companies.destroy' , $company->id), 'method' => 'DELETE')) }}
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
            {{$companies->links()}}
        </div>
    </div>
@endsection
