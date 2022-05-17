@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Student') }}</div>

                <div class="card-body">
                    <a href="{{ route('students.create') }}" class="btn btn-info btn-sm">New Student</a>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm" style="float:right;">Back</a>
                    <br><br>
                    <table class="table table-responsive table-stripe">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Roll</td>
                                <td>Name</td>
                                <td>Phone</td>
                                <td>Class Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $row)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $row->roll }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->phone}}</td>
                                <td>{{ $row->class_id }}</td>
                                <td>
                                     <a href="" class="btn btn-sm btn-info">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
