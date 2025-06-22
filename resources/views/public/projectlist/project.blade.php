@extends('public.desktop')

@section('title', 'Projects')

@section('window')

    <pre>{{ print_r(session()->all(), true) }}</pre>

@endsection
