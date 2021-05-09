<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitAssignment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function studentName(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function studentCourse(){
        return $this-> belongsTo(Course::class, 'course_id', 'id');
    }

}
