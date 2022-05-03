<?php

namespace App\Http\Controllers\classlist\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Models\Courses;
Use App\Models\Classlists;
Use App\Models\Students;
Use App\Models\User;
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
            $id = 'SECTION2';
            $classlists = Classlists::with('students.course','subjects','semester')->whereHas('subjects', function ($query) use ($id) { $query->where('subj_instructor',auth()->user()->id)->where('subj_section',$id); })->groupBy('student_id')->get();
        }

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
