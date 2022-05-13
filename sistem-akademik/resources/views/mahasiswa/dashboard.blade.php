@extends('layouts.app')
@section('title', $page_title)

@section('sidebar')
    @include('mahasiswa.sidebar')
@endsection

@section('content')
    @include('mahasiswa.sidebar')
    @include('mahasiswa.akademik')
    @include('mahasiswa.pengumuman')
@endsection
