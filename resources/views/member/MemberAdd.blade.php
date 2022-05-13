@extends('layouts.app')

@section('content')

<div class="col-lg-6 py-3">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary"><b>Create Member Account</b></h2>
        </div>
    </div>
      <div class="card ">
        <div class="card-body ">
          <h3 class="text-center text-primary">Member Details</h3>
          <hr>
                @if (session('status'))
                    <div class="bg-success text-center text-white py-2 mb-3">
                        {{ session('status') }}
                    </div>
                @endif
            <form action="{{ route('member/store') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_id">User ID <span class="text-danger">*</span></label>
                        <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id') }}" placeholder="">
                    </div>
                    <div>
                        @error('user_id')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="first_name">Firstname <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="">
                    </div>
                    <div>
                        @error('first_name')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="middle_name">Middlename</label>
                        <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" placeholder="">
                    </div>
                    <div>
                        @error('middle_name')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="last_name">Lastname <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="">
                    </div>
                    <div>
                        @error('last_name')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="suffix">Suffix</label>
                        <input type="text" name="suffix" class="form-control @error('suffix') is-invalid @enderror" value="{{ old('suffix') }}" placeholder="">
                    </div>
                    <div>
                        @error('suffix')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="">
                    </div>
                    <div>
                        @error('title')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="gender">Gender <span class="text-danger">*</span></label>
                        <select name="gender" class="form-control  @error('gender') is-invalid @enderror" id="">
                            <option value="">Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Others</option>
                        </select>
                    </div>
                    <div>
                        @error('gender')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}" placeholder="">
                    </div>
                    <div>
                        @error('birthday')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="">
                    </div>
                    <div>
                        @error('email')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="role">Role <span class="text-danger">*</span></label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option  value="{{ $role->name }}" {{ old('role') == $role->name ? "selected" : "" }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div>
                        @error('role')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
              <div class="col-md-12 d-none">
                  <div class="form-group">
                    <label for="permissions">Permissions</label>
                    <select name="permissions[]" multiple class="form-control @error('permissions') is-invalid @enderror" id="permissions">
                        @foreach($permissions as $permission)
                            <option   value="{{ $permission->name }}" {{ old('permissions') == $permission->name ? "selected" : "" }}>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div>
                        @error('permissions')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="dept_id">Department <span class="text-danger">*</span></label>
                    <select name="dept_id" class="form-control @error('dept_id') is-invalid @enderror" id="dept_id">
                        <option value="">Select Department</option>
                        @foreach($departments as $dept)
                            <option  value="{{ $dept->id }}" {{ old('dept_id') == $dept->id ? "selected" : "" }}>{{ $dept->dept_name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div>
                        @error('dept_id')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="post_id">Position</label>
                    <select name="post_id" class="form-control @error('post_id') is-invalid @enderror" id="post_id">
                        <option value="">Select Position</option>
                        @foreach($positions as $post)
                            <option  value="{{ $post->id }}" {{ old('post_id') == $post->id ? "selected" : "" }}>{{ $post->post_name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div>
                        @error('post_id')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="is_active">Active Status</label>
                    <select name="is_active" class="form-control @error('is_active') is-invalid @enderror" id="is_active">
                        <option value="">Select Position</option>
                        <option selected value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                  </div>
                  <div>
                        @error('is_active')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
              </div>
              <h3>Member Login Credentials</h3>
              <hr>
              <div class="col-md-12">
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="">
                    </div>
                    <div>
                        @error('username')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="" placeholder="">
                    </div>
                    <div>
                        @error('password')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirm <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="" placeholder="">
                    </div>
                    <div>
                        @error('password_confirmation')
                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block mb-3">CREATE MEMBER</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection