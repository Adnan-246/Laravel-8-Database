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
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>

                    @endif
                    <table class="table table-responsive table-stripe">
                        <thead>
                            <tr>
                                <td>SL</td>
                                <td>Roll</td>
                                <td>Name</td>
                                <td>email</td>
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
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone}}</td>
                                <td>{{ $row->class_name }}</td>
                                <td>
                                  <a href="{{ route('students.show', $row->id) }}" class="btn btn-sm btn-success">View</a>

                                     <a href="{{ route('students.edit', $row->id) }}" class="btn btn-sm btn-info">Edit</a>

                                     <form action="{{ route('students.destroy', $row->id) }}" method="post">
                                         @csrf
                                         <input type="hidden" name="_method" value="DELETE">
                                         <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                     </form>
                                    {{-- <a href="{{ route('students.destroy', $row->id) }}" class="btn btn-sm btn-danger"></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
