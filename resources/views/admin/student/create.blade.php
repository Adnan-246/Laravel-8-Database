@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Student') }}
                    <a href="{{ route('students.index') }}" class="btn btn-danger btn-sm" style="float:right;">All Student</a>
                </div>

                <div class="card-body">
                    @if (session()->has('success'))
                        <strong class="text-success">{{ session()->get('success') }}</strong>

                    @endif
                    <form action="{{ route('students.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Class Name</label>
                         <select class="form-control" name="class_id">
                             @foreach ($classes as $row)
                                 <option value="{{ $row->id }}">{{ $row->class_name }}</option>

                             @endforeach

                         </select>
                        </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Student Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleInputEmail1" placeholder="Student name" required>
                            @error ('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Student Roll</label>
                        <input type="text" name="roll" class="form-control @error('roll') is-invalid @enderror" value="{{ old('roll') }}" id="exampleInputEmail1" placeholder="Student roll" required>
                            @error ('roll')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Student Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputEmail1" placeholder="Student email" required>
                            @error ('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Student Phone</label>
                        <input type="textphone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="exampleInputEmail1" placeholder="Student phone" required>
                            @error ('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
