<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function studentInfo(){
        return $this-> belongsTo(User::class, 'user_id', 'id');
    }


    public function studentCourse(){
        return $this-> belongsTo(Course::class, 'course_id', 'id');
    }
}
