@extends('layouts.app')


@section('header')
    <h1 class="text-gray-800">Dashboard</h1>
@endsection


@section('content')

<h4 class="text-gray-800">
    Welcome {{ ucwords(Auth::user()->name) }}
</h4>
    
@endsection