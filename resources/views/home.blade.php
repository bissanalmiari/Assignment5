@extends('layout')
@section('title', 'Home')
@section('content')
<h1 class="text-center">Welcome to Laravel Kickstart</h1>
<div class="text-center mt-4">
   <a type="button" href="{{ route( 'students.create' ) }}" class="btn btn-primary">Add student</a>
   <a type="button" href="{{ route( 'students.index' ) }}" class="btn btn-primary">show Students</a>
</div>
@endsection