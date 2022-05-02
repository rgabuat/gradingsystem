<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Classlists;
use App\Models\Students;
use App\Models\Courses;
use App\Models\Subjects;
use App\Models\Semester;

class SearchController extends Controller
{
    public function search(Request $request){
       
        $search = $request->input('search');

        if(!empty($search))
        {
            $classlists = Classlists::with('students','courses','subjects','semester')->whereHas('students', function ($query) use ($search) { $query->where('std_number', 'like', "%{$search}%"); })->groupBy('student_id')->get();

            // $student =  Classlists::with('students','courses','subjects','semester')
            // ->where('std_number', 'LIKE', "%{$search}%")
            // ->orWhere('first_name', 'LIKE', "%{$search}%")
            // ->orWhere('last_name', 'LIKE', "%{$search}%")
            // ->groupBy('student_id')
            // ->get();
            // $student = Students::query()
            // ->where('std_number', 'LIKE', "%{$search}%")
            // ->orWhere('first_name', 'LIKE', "%{$search}%")
            // ->orWhere('last_name', 'LIKE', "%{$search}%")
            // ->with('students','courses','subjects','semester')
            // ->get();
            // return view('search', compact('posts'));

            return view('classlists.ClasslistsList',compact('classlists'));
        }
       else 
       {
           return redirect()->back();
       }
            
        // return view('search', compact('posts'));
    }
}
