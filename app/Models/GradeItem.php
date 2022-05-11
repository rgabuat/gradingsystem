<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeItem extends Model
{
    use HasFactory;
    protected $table = 'grading_item';
    protected $fillable = [
        'subj_id',
        'item_name',
        'max_grade',
        'grade_period',
        'cat_id'
    ];
}
