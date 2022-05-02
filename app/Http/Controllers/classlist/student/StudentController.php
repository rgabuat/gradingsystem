<?php

namespace App\Http\Controllers\classlist\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Models\Students;
Use App\Models\Courses;
Use App\Models\Subjects;
Use App\Models\Classlists;
Use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'std_number' => 'required|unique:students,std_number|max:255',
            'firstname' => 'required|max:255',
            'middlename' => 'required|unique:students,middle_name|max:255',
            'lastname' => 'required|unique:students,first_name|max:255',
            'course' => 'required',
        ]);

        $student = Students::create([
            'std_number' => $request->std_number,
            'first_name' => $request->firstname,
            'last_name' => $request->middlename,
            'middle_name' => $request->lastname,
            'status' => '1',
            'course_id' => $request->course,
        ]);

        if($student)
        {
            return redirect()->back()->with('status','Student Successfully Added');
        }

    }

    public function edit($sid)
    {
        

        $student = Students::where('id',$sid)->with('course')->get();
        $courses = Courses::all();
        return view('classlists.ClasslistsEditStudent',compact('student','courses'));
    }

    public function update(Request $request,$sid)
    {
        $this->validate($request, [
            'std_number' => 'required|unique:students,std_number|max:255',
            'firstname' => 'required|max:255',
            'middlename' => 'required|unique:students,middle_name|max:255',
            'lastname' => 'required|unique:students,first_name|max:255',
            'course' => 'required',
        ]);
    }

    public function get_subjects($sid)
    {
        $subjects = Classlists::with('subjects.instructors')->where('student_id',2)->get();
        $subs = Subjects::all();
        // $std_subjects = Classlists::with('students','courses','subjects','semester')->whereHas('subjects', function ($query)  { $query->where('subj_instructor','1')->join('users','users.id','=','subjects.subj_instructor'); })->where('student_id',$sid)->get();
        return view('classlists.ClasslistsListSubjects',compact('subjects','subs'));
    }

    public function deactivate(Request $request,$cid)
    {
        
    }

    public function activate(Request $request,$cid)
    {
        
    }
}
