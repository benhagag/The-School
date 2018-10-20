<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


use App\Course;
use App\Student;
use App\User;
use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //the tables i want to share with all views

        $courses = Course::all();
        $students = Student::all();
        $users = User::all();

        $usersmanager = DB::table('users')
            ->where('role', 'sales')
            ->orWhere('role', 'manager')
            ->get();


        // $students = Student::paginate(5);
        // $courses=Course::paginate(5);

        //the views to share with the tables

        View::share('courses', $courses);
        View::share('students', $students);
        View::share('users', $users);
        View::share('usersmanager', $usersmanager);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
