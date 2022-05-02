@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
<div class="card">
    <div class="card-body">
   
    <h2 class="text-center">Assigned Subjects</h2>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#addSubject" data-target class="btn btn-success">ASSIGN NEW SUBJECT</a>
    <table class="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($handled_subjects as $subject)
                <tr>

                    <td>{{ $subject['id']}}</td>
                    <td>{{ $subject['subj_name']}}</td>
                    <td>{{ $subject['subj_code']}}</td>
                    <td>{{ $subject['subj_description']}}</td>
                    <td>{{ $subject['subj_type']}}</td>
                    <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning " data-toggle="dropdown" aria-expanded="false">
                        <span class="fas fa-align-right"></span>
                        </button>
                            <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="{{ url('/member/'.$subject['subj_instructor'].'/subject/'.$subject['id'].'/class') }}" ><span class="fas fa-users mr-2"></span>View Class</a>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#deactivate"><span class="fas fa-times mr-2"></span>Remove Subject</a>
                                <!-- <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#activate"><span class="fas fa-eye mr-2"></span>Activate student</a> -->
                            </div>
                        </div>
                    </td>


                    <!-- deactivate Modal -->
                    <div class="modal fade" id="deactivate" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deactivateModal">Unassign Subject</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="post">
                                            @csrf
                                             <p>Unassign Subject</p>
                                            <input type="submit" class="btn btn-danger" value="UNASSIGN SUBJECT">
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
                                            <p>Activate Subject</p>
                                            <input type="submit" class="btn btn-danger" value="Activate company">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- Addsubject Modal -->
                <div class="modal fade" id="addSubject" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deactivateModal">Add Subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label for="#">Select Subject to add</label>
                                        <select name="subject" id="" class="form-control">
                                            <option value="">Select Subject</option>
                                        </select>
                                        <input type="submit" class="btn btn-primary mt-3" value="ADD SUBJECT">
                                    </div>
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
