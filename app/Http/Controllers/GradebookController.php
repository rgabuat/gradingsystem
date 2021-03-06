<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\GradeItem;
use App\Models\GradeGrades;

class GradebookController extends Controller
{
    public function category()
    {
        
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'cat_name' => 'required|max:255',
            'weight' => 'required|max:255',
        ]);

        $grade_category = Category::create([
            'subj_id' => $request->subj_id,
            'cat_name' => $request->cat_name,
            'weight' => $request->weight,
        ]);

        if($grade_category)
        {
            return redirect()->back()->with('status','New Category Created');
        }
    }

    public function grade_item_store(Request $request)
    {
        $this->validate($request,[
            'item_name' => 'required|max:255',
            'max_grade' => 'required|max:255',
            'grade_period' => 'required|max:255',
            'cat_id' => 'required|max:255',
        ]);

        $grade_item = GradeItem::create([
            'subj_id' => $request->subj_id,
            'item_name' => $request->item_name,
            'max_grade' => $request->max_grade,
            'grade_period' => $request->grade_period,
            'cat_id' => $request->cat_id,
        ]);

        if($grade_item)
        {
            foreach($request->std_id as $std)
            {
                $grade_grade = GradeGrades::create([
                    'item_id' => $grade_item['id'],
                    'std_id' => $std,
                    'grade' => 0,
                ]);
            }
            return redirect()->back()->with('status','New Grade Item Created');
        }
    }

    public function grade_store(Request $request)
    {
        $this->validate($request,[
            'grade' => 'required|max:255',
        ]);

        for($i=0;$i<count($request->std_no);$i++)
        {
            $student = $request->std_id[$i];
            $grade = $request->grade[$i];
            $grade_grade = GradeGrades::create([
                'item_id' => $request->item_id,
                'std_id' => $student,
                'grade' => $grade,
            ]);
        }

        if($grade_grade)
        {
            return redirect()->back()->with('status','Item has been Graded');
        }
    }

    public function grading_item_del(Request $request)
    {
        $grading_item_delete = GradeItem::where('subj_id',$request->subj_id)->where('id',$request->item_id)->delete();

        if($grading_item_delete)
        {
            
        }
    }
    
    public function grade_update(Request $request)
    {
        $response = GradeGrades::where('item_id',$request->item_id)->where('std_id',$request->std_id)->update(['grade' => $request->grade]);

        if($response)
        {
            return redirect()->back()->with('status','Grade Successfully Updated');
        }
    }
}
