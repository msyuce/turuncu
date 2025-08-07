{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Hoşgeldiniz, {{ auth()->user()->name }}</p>
@endsection
