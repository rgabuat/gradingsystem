<?php

namespace App\Http\Controllers\classlist\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Models\Courses;
Use App\Models\Classlists;
Use App\Models\Students;
Use App\Models\User;
Use App\Models\Subjects;
Use App\Models\Category;
Use App\Models\GradeItem;
Use App\Models\GradeGrades;
Use App\Models\Semesters;
use Spatie\Permission\Models\Permission;

use App\Imports\DomainImport;
use App\Imports\UserCollection;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ClasslistsController extends Controller
{

    public function index()
    {
        if(auth()->user()->hasRole(['admin','registrar','IT admin']))
        {
            $classlists = Classlists::with('students.course','courses','subjects','semester')->groupBy('student_id')->get();
        }
        // else 
        // {
        //     $id = 'GE102';
        //     $classlists = Classlists::with('students.course','subjects','semester')->whereHas('subjects', function ($query) use ($id) { $query->where('subj_instructor',auth()->user()->id)->where('subj_section',$id); })->groupBy('student_id')->get();
        // }

        return view('classlists.ClasslistsList',compact('classlists'));
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

    public function preview_import(Request $request)
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

    public function myClass()
    {
        $classes = Classlists::with('subjects')->get();
        $subj_section = Subjects::where('subj_instructor',auth()->user()->id)->get();
        return view('classlists.instructor.InstructorsClass',compact('subj_section'));
    }


    public function classStudents($cid)
    {
        $classStudents = Classlists::with('students.course')->where('subject_id',$cid)->get();
        $category = Category::where('subj_id',$cid)->get();

        $grade_item = GradeItem::with('cat')->where('subj_id',$cid)->orderBy('cat_id','DESC')->get();

        $grading = GradeGrades::with('gradeItem')->whereHas('gradeItem', function ($query) use ($cid) { $query->where('subj_id',$cid); })->get();

        return view('classlists.instructor.InstructorsClassStudents',compact('classStudents','category','grade_item','grading'));
    }

    public function parse(Request $request){
        
        $this->validate($request,[
            'file' => 'file|required|mimetypes:text/csv,text/plain,application/csv,text/comma-separated-values,text/anytext,application/octet-stream,application/txt',
        ]);

        $location = $request->file('file');
        $rpath = $location->getClientOriginalName();

        if($request->hasFile('file')){
            $data =  Excel::toArray(new UserCollection, $location);
            $heading = Excel::toArray([], $location);

            $destinationPath = 'public/excels/uploads';
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $path = $request->file('file')->storeAs($destinationPath,$file_name);
            // $destinationFQN = "$destinationPath/$destinationName";
          
            $param = [
                'students' => $data[0],
                'heading' => $heading[0][0],
                'location' => $file_name
            ];

        }
        $subjects = Subjects::all();
        return view('classlists.ClasslistsImportClass',compact('param','subjects'));
    }

    public function import_students(Request $request)
    {
        $this->validate($request,[
            'sections' => 'required'
        ]);

        $std_number = $request->std_number;
        $std_fname = $request->first_name;
        $std_lastname = $request->last_name;
        $std_middlename = $request->middle_name;
        $std_status = $request->status;
        $std_course = $request->course_id;


      
        if($std_number != FALSE)
        {
            for($i=0;$i<count($std_number);$i++)
            {
                
                if(!$std_number[$i] == 0)
                {
                    $verify_std_id = Students::where('std_number',$std_number[$i])->get();
                    $curr_sem = Semesters::where('sem_status',1)->get();
                    
                    if($verify_std_id->isEmpty())
                    {
                        $student_create = Students::create([
                            'std_number' => $std_number[$i],
                            'first_name' => $std_fname[$i],//utf-8
                            'last_name' => $std_lastname[$i],
                            'middle_name' => $std_middlename[$i],
                            'course_id' => $std_course[$i],
                            'status' => 1
                        ]);
                        $std_id = $student_create->id;

                        $verify_subject_classlist = Classlists::where('student_id',$std_id)->where('subject_id',$request->sections)->where('sem_id',$curr_sem)->get();
                        if($verify_subject_classlist->isEmpty())
                        {
                            $classlist_create = Classlists::create([
                                'student_id' => $std_id,
                                'subject_id' => $request->sections,
                                'sem_id' => 1,
                            ]);
                        }
                    }
                    else 
                    {
                        $verify_subject_classlist = Classlists::where('student_id',$verify_std_id[0]['id'])->where('subject_id',$request->sections)->where('sem_id',$curr_sem)->get();
                        if($verify_subject_classlist->isEmpty())
                        {
                            $classlist_create = Classlists::create([
                                'student_id' => $verify_std_id[0]['id'],
                                'subject_id' => $request->sections,
                                'sem_id' => 1,
                            ]);
                        }
                    }

                }
            }
            return redirect('/Classlists/import-class')->with('status','Class Record Generated');

        }

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
