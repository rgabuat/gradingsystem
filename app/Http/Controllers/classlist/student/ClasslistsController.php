<?php

namespace App\Http\Controllers\classlist\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Models\Courses;
Use App\Models\Classlists;
Use App\Models\Students;

class ClasslistsController extends Controller
{

    public function index()
    {
        $classlists = Classlists::with('students','courses','subjects','semester')->groupBy('student_id')->get();
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
