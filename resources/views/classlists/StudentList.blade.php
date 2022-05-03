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
                    <th>Student Firstname</th>
                    <th>Student Middlename</th>
                    <th>Student Lastname</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning " data-toggle="dropdown" aria-expanded="false">
                        <span class="fas fa-align-right"></span>
                        </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="{{ url('Classlists/student/modify/') }}"><span class="fas fa-pen mr-2"></span>Modify Profile</a>
                                <a class="dropdown-item" href="{{ url('Classlists/student/subjects/') }}"><span class="fas fa-swatchbook mr-2"></span>View Subjects</a>
                                <a class="dropdown-item" href="{{ url('Classlists/student/course/') }}"><span class="fas fa-graduation-cap mr-2"></span>Add Course</a>
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
            </tbody>
        </table>
    </div>
</div>
<div>
@endsection
