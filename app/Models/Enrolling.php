<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolling extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function enrollCourse(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function studentName(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
