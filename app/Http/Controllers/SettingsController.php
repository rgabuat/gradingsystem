<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Semesters;

class SettingsController extends Controller
{
    public function semester_index()
    {
        $semesters = Semesters::all();
        return view('semesters.Lists',compact('semesters'));
    }

    public function semester_create()
    {
        
    }

    public function semester_edit()
    {
        
    }

    public function semester_active()
    {
        
    }
}
