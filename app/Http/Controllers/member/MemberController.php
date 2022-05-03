<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
Use App\Models\Positions;
Use App\Models\Departments;
Use App\Models\User;
Use App\Models\Subjects;
Use App\Models\Classlists;


class MemberController extends Controller
{
    public function index()
    {
        $members = User::all();
        return view('member.MemberList',compact('members')); 
    }

    public function get_subjects($mid)
    {
        $handled_subjects = Subjects::where('subj_instructor',$mid)->get();
        return view('member.MemberSubjects',compact('handled_subjects')); 
    }

    public function get_subjects_class($iid=1,$sid)
    {
        $classlists = Classlists::with('students')->where('subject_id',$sid)->get();
        return view('member.MemberSubjectClass',compact('classlists'));
    }

    public function get_subjects_grade($iid,$sid,$stid)
    {
        // $classlists = Classlists::with('students')->where('subject_id',$sid)->get();
        return view('member.MemberSubjectGrade');
    }

    public function create()
    {
        $positions = Positions::all();
        $departments = Departments::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('member.MemberAdd',compact('positions','departments','positions','roles','permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required|unique:users,user_id|min:4',
            'first_name' => 'required|min:3',
            'middle_name' => 'unique:users,middle_name',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users,email|email', 
            'username' => 'required|unique:users,username|min:4',
            'password' => 'required|confirmed',
            'role' => 'required',
            'post_id' => 'required',
            'dept_id' => 'required',
            'is_active' => 'required',
        ]);

        $member = User::create([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'title' => $request->title,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'post_id' => $request->post_id,
            'dept_id' => $request->dept_id,
            'is_active' => $request->is_active
        ]);
        $role = $member->assignRole($request->role);
        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('status','Member create success.');
    }

    public function edit($cid)
    {
        return view('member.MemberEdit');
    }

    public function update(Request $request,$cid)
    {
        
    }

    public function deactivate(Request $request,$cid)
    {
        
    }

    public function activate(Request $request,$cid)
    {
        
    }
}
