<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function students()
    {

        return $this->belongsToMany('App\Student', 'course_student', 'course_id', 'student_id');
    }
}


