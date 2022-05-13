@extends('layouts.app')


@section('content')
<div class="pt-3">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary"><b>Upload Students to Class List</b></h2>
            @if (session('status'))
                <div class="bg-success text-center text-white mb-3 py-2">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Classlists/parse_import') }}" method="post" enctype="multipart/form-data">
                     @csrf
                        <h4>Step 1</h4>
                        <p>Click Upload File and Browse for CSV template</p>
                        <div class="form-group">
                            <input type="file" name="file" class="form-control @error('std_number') is-invalid @enderror">
                            @error('file')
                                <span class="error invalid-feedback d-block"> {{ $message }}</span>
                            @enderror
                        </div>
                        <input type="submit" class="form-control btn btn-primary" value="LOAD FILE">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                @if(isset($param))
                <form action="{{ route('Classlists/import-students') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4>Step 2</h4>
                    
                    <p>Select for Section</p>
                    <div class="form-group">
                        <select name="sections" id="" class="form-control" required>
                            <option value="">Select Section</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject['id'] }}">{{ $subject['subj_code'] }} - {{ $subject['subj_section'] }}</option>
                            @endforeach
                        </select>
                    </div>
                            @foreach($param['students'] as $students)
                                <input type="hidden" name="std_number[]" value="{{ $students[1] }}" >
                                <input type="hidden" name="first_name[]" value="{{ $students[2] }}">
                                <input type="hidden" name="middle_name[]" value="{{ $students[3] }}">
                                <input type="hidden" name="last_name[]" value="{{ $students[4] }}">
                                <input type="hidden" name="status[]" value="{{ $students[5] }}">
                                <input type="hidden" name="course_id[]" value="{{ $students[6] }}">
                            @endforeach
                        <input type="submit" class="form-control btn btn-primary" value="IMPORT STUDENTS">
                    </form>
                    @else 
                    <h3 class="text-center text-danger">Please Load A file to proceed step 2</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
 
    @if(isset($param))
    <div class="card">
        <div class="card-body">
        <h3 class="text-primary">CSV Contents</h3>
        <table class="table">
            <thead>
                <tr>
                @foreach($param['heading'] as $headings)
                    <th>{{ $headings }}</th>
                @endforeach
                </tr>
            </thead>
                <tbody>
                    @foreach($param['students'] as $students)
                        <tr>
                            <td>{{ $students[0] }}</td>
                            <td>{{ $students[1] }}</td>
                            <td>{{ $students[2] }}</td>
                            <td>{{ $students[3] }}</td>
                            <td>{{ $students[4] }}</td>
                            <td>{{ $students[5] }}</td>
                            <td>{{ $students[6] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </form>
        </table>
        </div>
    </div>
    @endif


@endsection