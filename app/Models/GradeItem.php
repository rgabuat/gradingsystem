<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

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

    public function cat()
    {
        return $this->hasMany(Category::class,'id','cat_id');
    }
}
