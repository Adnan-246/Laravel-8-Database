@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Details') }}
                <a href="{{ route('students.index') }}" class="btn btn-danger btn-sm" style="float:right;">All Student</a>
                </div>
                <div class="card-body">
                    <ul class="list">
                        <li class="list-item">Name: {{ $student->name }}</li>
                        <li class="list-item">Class: {{ $student->class_id }}</li>
                        <li class="list-item">Roll: {{ $student->roll }}</li>
                        <li class="list-item">Phone: {{ $student->phone }}</li>
                        <li class="list-item">Email: {{ $student->email }}</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
