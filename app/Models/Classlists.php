<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Use App\Models\Students;
Use App\Models\Subjects;
use App\Models\Semesters;
use App\Models\Courses;
use App\Models\User;


class Classlists extends Model
{
    use HasFactory;

    protected $table = 'classlists';
    protected $fillable = [
        'student_id',
        'subject_id',
        'sem_id',
    ];

    public function students()
    {
       return  $this->hasMany(Students::class,'id','student_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subjects::class,'id','subject_id');
    }

    public function semester()
    {
        return $this->hasMany(Semesters::class,'id','sem_id');
    }

    public function courses()
    {
        return $this->hasMany(Courses::class,'id','student_id');
    }


}
