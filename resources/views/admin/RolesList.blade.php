@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
<div class="card">
    <div class="card-body">
    <h2 class="text-center">Roles Lists</h2>
    <table class="table">
            <thead class="text-center">
                <tr>
                    <th>S/N</th>
                    <th>Roles</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles_permission as $role_perm)
                    <tr>
                        <td>{{ $role_perm->id }}</td>
                        <td><b>{{ $role_perm->name }}</b></td>
                        <td>
                        @if(!$role_perm->permissions->isEmpty())
                            @foreach($role_perm->permissions as $permissions )
                                @if(!$permissions->isEmpty)
                                <div class="form-check form-check-inline">
                                    <p  class="btn btn-primary btn-sm" style="border-radius:25px;">{{ $permissions->name }}</p>
                                </div>
                                @endif
                               
                            @endforeach
                        @else
                            <p class="text-center">No Permission Assigned</p>
                        @endif
                        </td>
                        <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning " data-toggle="dropdown" aria-expanded="false">
                            <span class="fas fa-align-right"></span>
                            </button>
                                <div class="dropdown-menu" role="menu" style="left:-140px !important;">
                                    <a class="dropdown-item" href="{{ url('Classlists/student/modify/') }}"><span class="fas fa-pen mr-2"></span>Modify Profile</a>
                                    <a class="dropdown-item" href="{{ url('Classlists/student/subjects/') }}"><span class="fas fa-swatchbook mr-2"></span>View Subjects</a>
                                    <a class="dropdown-item" href="{{ url('Classlists/student/course/') }}"><span class="fas fa-graduation-cap mr-2"></span>Add Course</a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#deactivate"><span class="fas fa-eye-slash mr-2"></span>Deactivate student</a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#activate"><span class="fas fa-eye mr-2"></span>Activate student</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div>
@endsection
