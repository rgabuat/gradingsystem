@extends('layouts.app')

@section('content')
<div class="col-lg-6 py-3">
  <div class="card">
    <div class="card-body">
    <h2 class="login-box-msg h2 text-center px-0 text-primary"><b>Assign Subject</b></h2>
    </div>
  </div>
      <div class="card ">
        <div class="card-body ">
                @if (session('status'))
                    <div class="bg-success text-center text-white py-2 mb-3">
                        {{ session('status') }}
                    </div>
                @endif
            <h3 class="text-center text-primary">Subject Details</h3>
            <hr>
            <form action="{{ route('subject/store') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subj_name">Subject Name <span class="text-danger">*</span></label>
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
                    <label for="subj_code">Subject Code <span class="text-danger">*</span></label>
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
                    <label for="subj_units">Subject Units <span class="text-danger">*</span></label>
                    <select name="subj_units" id="subj_units" class="form-control @error('subj_units') is-invalid @enderror">
                        <option value="">Units</option>
                        <option value="2">1</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                    </select>
                  </div>
                    @error('subj_units')
                        <span class="error invalid-feedback d-block"> {{ $message }}</span>
                    @enderror
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="subj_section">Subject Section <span class="text-danger">*</span></label>
                    <input type="text" name="subj_section"  class="form-control @error('subj_section') is-invalid @enderror" value="{{ old('subj_section') }}" placeholder="">
                  </div>
                    @error('subj_section')
                        <span class="error invalid-feedback d-block"> {{ $message }}</span>
                    @enderror
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="course">Instructor <span class="text-danger">*</span></label>
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