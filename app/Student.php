<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function courses()
    {

        return $this->belongsToMany('App\Course', 'course_student', 'student_id', 'course_id');
    }

}
