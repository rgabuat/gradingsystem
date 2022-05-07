@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
<div class="card">
    <div class="card-body">
    <h2 class="text-center">Class Lists Records</h2>
    <form action="{{ route('Classlists/lists/search') }}" method="get" class="form-inline">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <table class="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Student Id</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student['id'] }}</td>
                    <td>{{ $student['std_number'] }}</td>
                    <td>{{ $student['first_name'] }}</td>
                    <td>{{ $student['middle_name'] }}</td>
                    <td>{{ $student['last_name'] }}</td>
                    <td>{{ $student['course']['0']['crse_name'] }}</td>
                    <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning " data-toggle="dropdown" aria-expanded="false">
                        <span class="fas fa-align-right"></span>
                        </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="{{ url('Classlists/student/modify/'.$student['id']) }}"><span class="fas fa-pen mr-2"></span>Modify Profile</a>
                                <!-- <a class="dropdown-item" href="{{ url('Classlists/student/subjects/') }}"><span class="fas fa-swatchbook mr-2"></span>View Subjects</a> -->
                                <a class="dropdown-item" href="{{ url('Classlists/student/'.$student['id'].'/add-subject/') }}"><span class="fas fa-book mr-2"></span>Add Subject</a>
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
