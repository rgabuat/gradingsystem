<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semesters extends Model
{
    use HasFactory;

    protected $table = 'semesters';
    protected $fillable = [
        'semester_year',
        'sem_title',
        'sem_status',
    ];
}
