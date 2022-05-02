<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


Use App\Models\Subjects;
use App\Models\Semesters;
use App\Models\Courses;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'std_number',
        'first_name',
        'middle_name',
        'last_name',
        'status',
        'course_id',
    ];

    public function course()
    {
       return  $this->hasMany(Courses::class,'id','course_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subjects::class,'id','subject_id');
    }


    
}
