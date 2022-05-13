@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
<div class="card">
    <div class="card-body">
        <h2 class="text-center text-primary"><b>Class Lists Records</b></h2>
    </div>
</div>
<div class="card">
    <div class="card-body">
    @if (session('status'))
        <div class="bg-success text-center text-white py-2 mb-3">
            {{ session('status') }}
        </div>
    @endif
    <table class="table" id="example1">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Student Id</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php($count=1)
                @foreach($classlists as $classlist)
                <tr>
                    <td>{{ $count++}}</td>
                    <td>{{ $classlist['students'][0]['std_number']}}</td>
                    <td>{{ $classlist['students'][0]['first_name']}}</td>
                    <td>{{ $classlist['students'][0]['middle_name']}}</td>
                    <td>{{ $classlist['students'][0]['last_name']}}</td>
                    <td>{{ $classlist['students'][0]['course'][0]['crse_name']}}</td>
                    <td>{{ $classlist['semester'][0]['semester_year']}}</td>
                    <td>{{ $classlist['students'][0]['status']}}</td>
                    <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning " data-toggle="dropdown" aria-expanded="false">
                        <span class="fas fa-align-right"></span>
                        </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="{{ url('Classlists/student/modify/'.$classlist['students'][0]['id']) }}"><span class="fas fa-pen mr-2"></span>Modify Profile</a>
                                <a class="dropdown-item" href="{{ url('Classlists/student/subjects/'.$classlist['students'][0]['id']) }}"><span class="fas fa-swatchbook mr-2"></span>View Subjects</a>
                                <a class="dropdown-item" href="{{ url('Classlists/student/course/'.$classlist['students'][0]['id']) }}"><span class="fas fa-graduation-cap mr-2"></span>Add Course</a>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#deactivate"><span class="fas fa-eye-slash mr-2"></span>Deactivate student</a>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#activate"><span class="fas fa-eye mr-2"></span>Activate student</a>
                            </div>
                        </div>
                    </td>

                    <!-- deactivate Modal -->
                        <div class="modal fade" id="deactivate" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deactivateModal">Deactivate company</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    Deactivate Company
                                    <div class="modal-body">
                                        <form action="#" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="Deactivate company">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- activate Modal -->
                        <div class="modal fade" id="activate" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="activateModal">Deactivate company</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    Deactivate Company
                                    <div class="modal-body">
                                        <form action="#" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="Activate company">
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
<div>
@endsection
