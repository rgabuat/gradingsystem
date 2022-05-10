
@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary"><b>Grade Book</b></h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            category
                        </td>
                        <td>
                            <select name="" id="" class="form-control">
                                <option value="">Uncategorized</option>
                                <option value="">Assignment (25%)</option>
                                <option value="">Quiz (25%)</option>
                                <option value="">Lab (25%)</option>
                                <option value="">Exam (25%)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Item Count
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Title
                        </td>
                        <td>
                            <input type="text" class="form-control">
                        </td>
                    </tr>
                    @foreach($classStudents as $class)
                    <tr>
                        <td>{{ $class['students'][0]['std_number'] }} {{ $class['students'][0]['first_name'] }} {{ $class['students'][0]['middle_name'] }}</td>
                        <td>
                            <input type="text" name="score" class="form-control">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
