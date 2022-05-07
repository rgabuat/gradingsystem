@extends('layouts.app')


@section('content')
<div class="col-lg-6 py-3">
      <div class="card ">
        <div class="card-body ">
          <p class="login-box-msg h2 text-left px-0">Add New Student</p>
                @if (session('status'))
                    <div class="bg-success text-center text-white py-2 mb-3">
                        {{ session('status') }}
                    </div>
                @endif
            <form action="{{ url('student/update/'.$student[0]['id']) }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="std_number">Student Number</label>
                        <input type="text" name="std_number" class="form-control @error('std_number') is-invalid @enderror" value="{{ $student[0]['std_number'] }}" placeholder="Student Number">
                    </div>
                    <div>
                        @error('std_number')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ $student[0]['first_name'] }}" placeholder="Input Firstname">
                  </div>
                  <div>
                        @error('firstname')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="middlename">Middlename</label>
                    <input type="text" name="middlename" class="form-control @error('middlename') is-invalid @enderror" value="{{ $student[0]['middle_name'] }}" placeholder="Input Middlename">
                  </div>
                  <div>
                        @error('middlename')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{  $student[0]['last_name'] }}" placeholder="Input Lastname">
                  </div>
                        @error('lastname')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="course">course</label>
                    <select name="course" class="form-control @error('course') is-invalid @enderror" id="course">
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                        <option {{ $student[0]['course_id'] == $course->id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->crse_name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div>
                        @error('course')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
           <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block mb-3">Update Student Details</button>
           </div>
          </form>
        </div>
    </div>
</div>

@endsection