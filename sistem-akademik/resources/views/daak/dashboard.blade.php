@extends('layouts.app')
@section('title', 'DaaK Page Title')

@section('sidebar')
    @include('daak.sidebar')
@endsection

@section('content')
    @include('dosen.sidebar')
    @include('dosen.akademik')
    @include('dosen.pengumuman')
@endsection





