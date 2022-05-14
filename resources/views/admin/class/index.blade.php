@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class') }}</div>

                <div class="card-body">
                    <a href="#" class="btn btn-info btn-sm">Add New</a>
                    <br><br>
                    <table class="table table-responsive table-stripe">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Class Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class as $key => $row)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $row->class_name }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
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
