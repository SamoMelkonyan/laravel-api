@extends('layouts.app')
@section('content')
    <div class="container company-show-container">
        <a href="{{route('companies.index')}}" class="back-link"><i class="fa fa-chevron-circle-left"></i></a>
        <h1 class="text-center mb-3">{{$company->name}}</h1>
        <div class="text-center">Email : <a href="mailto:{{$company->email}}">{{$company->email}}</a></div>
        <div class="text-center">Website : <a href="{{$company->website}}">{{$company->website}}</a></div>
        @if($company->logo)
        <div class="text-center"><img src="{{asset("storage/$company->logo")}}" alt="{{$company->name}}"></div>
        @endif
    </div>
@endsection
