
@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
<form action="{{ url('Classlists/student/'.$student[0]['id'].'/add-subject') }}" method="post">
    @csrf
    <div class="card">
            <div class="card-body">
                <h2 class="text-center text-primary"><b>Add Subject</b> </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-left text-info mb-3">Student Information</h3>
                        <h4 class="text-secondary">Student Id: <span class="text-primary pl-3">{{ $student[0]['std_number'] }}</span></h4>
                        <h4 class="text-secondary">Firstname: <span class="text-primary pl-3">{{ $student[0]['first_name'] }}</span></h4>
                        <h4 class="text-secondary">Middlename: <span class="text-primary pl-3">{{ $student[0]['middle_name'] }}</span></h4>
                        <h4 class="text-secondary">Lastname: <span class="text-primary pl-3">{{ $student[0]['last_name'] }}</span></h4>
                        <h4 class="text-secondary">Course: <span class="text-primary pl-3">{{ $student[0]['course'][0]['crse_name'] }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h2 class="text-center text-primary mb-3"><b>Subjects</b></h2>
                    <div class="table-responsive-sm py-3">
                        <table class="table">
                                <thead>
                                    <tr >
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Units</th>
                                        <th>Section</th>
                                        <th>Instructor</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $subject)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-switch custom-switch-on-success">
                                                <input type="checkbox" name="subject[]" class="custom-control-input" value="{{ $subject['id'] }}" id="subjects{{ $subject['id'] }}">
                                                <label class="custom-control-label" for="subjects{{ $subject['id'] }}"> <span class="pr-2"></span> {{ $subject['subj_name'] }}</label>
                                            </div>
                                        </td>
                                        <td><span class="px-2">{{ $subject['subj_code'] }}</span></td>
                                        <td><span class="px-2">{{ $subject['subj_description'] }}</span></td>
                                        <td><span class="px-2">{{ $subject['subj_units'] }}</span></td>
                                        <td><span class="px-2">{{ $subject['subj_section'] }}</span></td>
                                        <td><span class="px-2">{{ $subject['instructor'][0]['user_id'] }}</span></td>
                                        <td>
                                            <span class="px-2">{{ $subject['semester'][0]['semester_year']}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                </div>
            </div>
        </div>
            <input type="submit" class="btn btn-primary" value="ADD TO CLASSLISTS">
    </form>
<div>
@endsection
