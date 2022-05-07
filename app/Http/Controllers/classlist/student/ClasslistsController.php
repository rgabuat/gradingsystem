<?php

namespace App\Http\Controllers\classlist\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Models\Courses;
Use App\Models\Classlists;
Use App\Models\Students;
Use App\Models\User;
Use App\Models\Subjects;
use Spatie\Permission\Models\Permission;

class ClasslistsController extends Controller
{

    public function index()
    {
        if(auth()->user()->hasRole(['admin','registrar','IT admin']))
        {
            $classlists = Classlists::with('students.course','courses','subjects','semester')->groupBy('student_id')->get();
        }
        else 
        {
            $id = 'GE102';
            $classlists = Classlists::with('students.course','subjects','semester')->whereHas('subjects', function ($query) use ($id) { $query->where('subj_instructor',auth()->user()->id)->where('subj_section',$id); })->groupBy('student_id')->get();
        }

        $subj_section = Subjects::where('subj_instructor',auth()->user()->id)->get();

        return view('classlists.ClasslistsList',compact('classlists','subj_section'));
    }

    public function section_class(Request $request)
    {
        $section = 'GE102-A';
        $classlists = Classlists::with('students.course','subjects','semester')->whereHas('subjects', function ($query) use ($id) { $query->where('subj_instructor',3)->where('subj_section',$section); })->groupBy('student_id')->get();
    
        return view('classlists.ClasslistsList',compact('classlists'));
    }

    public function create()
    {
        $courses = Courses::all();
        return view('classlists.ClasslistsCreateStudent',compact('courses'));
    }

    public function preview_import()
    {
        return view('classlists.ClasslistsImportClass');
    }

    public function students()
    {
        $classlists = Classlists::pluck('student_id')->all();
        $students = Students::whereNotIn('id',$classlists)->with('course')->get();
        
        return view('classlists.StudentList',compact('students'));
    }

    public function add_subjects($sid)
    {
        $student = Students::where('id',$sid)->with('course')->get();
        $subjects = Subjects::with('instructor','semester')->get();
        return view('classlists.StudentAddSubject',compact('student','subjects'));
    }

    public function store_subjects(Request $request,$sid)
    {
        foreach($request->subject as $sub)
        {
            $student = Classlists::create([
                'student_id' => $sid,
                'subject_id' => $sub,
                'sem_id' => 1,
            ]);
        }
        return redirect('/Classlists/lists')->with('status','New Student added to Classlist');
    }

    public function store(Request $request)
    {

    }

    public function edit($cid)
    {
        
    }

    public function update(Request $request,$cid)
    {
        
    }

    public function deactivate(Request $request,$cid)
    {
        
    }

    public function activate(Request $request,$cid)
    {
        
    }//
}
