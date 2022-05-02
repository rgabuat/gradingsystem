<?php

namespace App\Http\Controllers\subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Subjects;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subjects::with('instructors')->get();
        return view('subjects.SubjectLists',compact('subjects'));
    }

    public function create()
    {
        $members = User::all();
        return view('subjects.SubjectAdd',compact('members'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subj_name' => 'required|unique:subjects,subj_name|max:255',
            'subj_code' => 'required|unique:subjects,subj_code|max:255',
            'subj_units' => 'required|max:255',
            'subj_instructor' => 'required',
        ]);


        $subj_assign = Subjects::create([
            'subj_name' => $request->subj_name,
            'subj_code' => $request->subj_code,
            'subj_description' => $request->subj_desc,
            'subj_units' => $request->subj_units,
            'subj_section' => $request->subj_section,
            'subj_instructor' => $request->subj_instructor,
            'sem_id' => '1'
        ]);

        return redirect()->back()->with('status','Subject Assign Success');

    }

    public function edit($sid)
    {
        
    }

    public function update(Request $request,$sid)
    {
        
    }

    public function deactivate(Request $request,$sid)
    {
        
    }

    public function activate(Request $request,$sid)
    {
        
    }
}
