{{-- resources/views/back/dashboard/index.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </h1>
@endsection
