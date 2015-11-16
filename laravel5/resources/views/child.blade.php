@extends('master')

@section('title','laravel example')

@endsection


@section('sidebar')

@parent
<p>This is appended to the master sidebar.</p>
{{-- this is not going to render out--}}
@endsection


@section('container')
<p>This is my body content.</p>
@endsection