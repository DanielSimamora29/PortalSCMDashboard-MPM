@extends('layouts.master')

@section('content')

@section('page_name', 'SCM Dashboard SuperAdmin')

<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
    <iframe width="1080" height="760" src="{{ auth()->user()->dashboard_link }}" frameborder="0"
    allowfullscreen></iframe>
</div>


@endsection