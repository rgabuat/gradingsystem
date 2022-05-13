@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary"><b>Set Year Semester</b></h2>
        </div>
    </div>
    <div class="row">
        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary"><b></b></h5>
                    <a href="javascript:void(0)" class="btn btn-primary rounded-0"  data-toggle="modal" data-target="#add_semester" ><span class="fas fa-plus mr-2 "></span> ADD NEW SEMESTER</a>
                    <table class="table">
                        <thead>
                            <th>S/N</th>
                            <th>Sem Title</th>
                            <th>Sem Year</th>
                            <th>Sem Status</th>
                            <th>Actions</th>
                        </thead>
                            <tbody>
                                @foreach($semesters as $semester)
                                    <tr>
                                        <td>{{ $semester['id'] }}</td>
                                        <td>
                                            {{ $semester['sem_title'] }}
                                        </td>
                                        <td>
                                            {{ $semester['semester_year'] }}
                                        </td>
                                        <td>
                                            @if($semester['sem_status'] == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else 
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" {{ $semester['sem_status'] == 1 ? 'checked' : ''}} name="custom-switch" class="custom-control-input chb" id="customSwitch{{ $semester['id'] }}">
                                                    <label class="custom-control-label" for="customSwitch{{ $semester['id'] }}"></label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- add semester Modal -->
                                        <div class="modal fade" id="add_semester" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deactivateModal">Create New Semester</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="#" method="post">
                                                            @csrf
                                                            <input type="submit" class="btn btn-primary" value="Create Semester">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                @endforeach
                            </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
