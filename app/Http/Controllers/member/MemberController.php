<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
        return view('member.MemberAdd',compact('positions','departments','positions','roles'));
    }

    public function store(Request $request)
    {

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
