<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\GradeItem;

class GradeGrades extends Model
{
    use HasFactory;
    
    protected $table = 'grading_grades';
    protected $fillable = [
        'item_id',
        'std_id',
        'grade',
    ];

    public function gradeItem()
    {
        return $this->hasMany(GradeItem::class,'id','item_id');
    }
}
