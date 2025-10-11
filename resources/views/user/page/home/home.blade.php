@extends('user.layouts.app')

@section('title', 'Home Page')

@section('content')
    <h1>Hello, {{ auth()->user()->name ?? 'Guest' }}!</h1>
    <p>Welcome to the user dashboard.</p>
@endsection
