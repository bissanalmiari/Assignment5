
@extends('layout')
@section('title', 'Students')
@section('content')
<h2>Students</h2>
<input type="text" name="name" id="search" placeholder="search by name" class="m-2" autocomplete="off">
<input type="number" id="min_age" placeholder="min age" class="m-2">
<input type="number" id="max_age" placeholder="max age" class="m-2">

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody id="student-table">
        @include('student_rows', ['students' => $students])
    </tbody>
</table>

@endsection