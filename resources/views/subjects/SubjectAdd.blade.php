@extends('layouts.app')

@section('content')
<div class="col-lg-6 py-3">
      <div class="card ">
        <div class="card-body ">
          <p class="login-box-msg h2 text-left px-0">Assign Subjects</p>
                @if (session('status'))
                    <div class="bg-success text-center text-white py-2 mb-3">
                        {{ session('status') }}
                    </div>
                @endif
            <form action="{{ route('subject/store') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subj_name">Subject Name</label>
                        <input type="text" name="subj_name" class="form-control @error('subj_name') is-invalid @enderror" value="{{ old('subj_name') }}" placeholder="">
                    </div>
                    <div>
                        @error('subj_name')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="subj_code">Subject Code</label>
                    <input type="text" name="subj_code" class="form-control @error('subj_code') is-invalid @enderror" value="{{ old('subj_code') }}" placeholder="">
                  </div>
                  <div>
                        @error('subj_code')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="middlename">Subject Description</label>
                    <textarea name="subj_desc" id="" class="form-control" cols="30" value="{{ old('subj_desc') }}" rows="10"></textarea>
                  </div>
                  <div>
                        @error('subj_desc')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="subj_units">Subject Units</label>
                    <input type="text" name="subj_units" class="form-control @error('subj_units') is-invalid @enderror" value="{{ old('subj_units') }}" placeholder="">
                  </div>
                        @error('subj_units')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="subj_type">Subject Units</label>
                    <input type="text" name="subj_type" class="form-control @error('subj_type') is-invalid @enderror" value="{{ old('subj_type') }}" placeholder="">
                  </div>
                    @error('subj_type')
                        <span class="error invalid-feedback d-block"> {{ $message }}</span>
                    @enderror
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="subj_section">Subject Units</label>
                    <input type="text" name="subj_section" class="form-control @error('subj_section') is-invalid @enderror" value="{{ old('subj_section') }}" placeholder="">
                  </div>
                    @error('subj_section')
                        <span class="error invalid-feedback d-block"> {{ $message }}</span>
                    @enderror
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="course">Instructor</label>
                    <select name="subj_instructor" class="form-control @error('subj_instructor') is-invalid @enderror" id="subj_instructor">
                        <option value="">Select Instructor</option>
                        @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->username }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div>
                        @error('subj_instructor')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
           <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block mb-3">ASSIGN SUBJECT</button>
           </div>
          </form>
        </div>
    </div>
</div>


@endsection