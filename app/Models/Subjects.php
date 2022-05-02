<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


Use App\Models\User;

class Subjects extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $fillable = [
        'subj_name',
        'subj_code',
        'subj_description',
        'subj_units',
        'subj_type',
        'subj_section',
        'subj_instructor',
        'sem_id',
    ];

    public function instructors(){
        return $this->hasMany(User::class,'id','subj_instructor');
    }

}
