<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $this->validate($request, [

            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'image' => 'image|nullable|max:1999' //those are the thr type of file and kb amount
        ]);

        if ($request->hasFile('image')) {
            //Get Filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        $student = new Student;
        $student->name = $request->input('name');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->image = $fileNameToStore;
        $student->save();


        $student->courses()->sync($request->courses, false);

        return redirect()->action(
            'StudentsController@show', ['id' => $student->id]
        )->with('success', 'Student Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        // dd($student->courses);
        $studentCourses = $student->courses;
        // dd($studentCourses);
        $edit = true;
        $studentId = $id;

        $courses2 = array();
        foreach ($studentCourses as $studentCourse) {

            $courses2[] = $studentCourse->id;
            // dd($courses2);

        }
        // dd($courses2);

        return view('students.edit')->with('student', $student)->with('courses2', $courses2);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'image' => 'image|nullable|max:1999' //those are the thr type of file and kb amount
        ]);

        $student = Student::find($id);

        if ($request->hasFile('image')) {
            //Get Filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        } else {
            $fileNameToStore = $student->image;
        }


        $student->name = $request->input('name');
        $student->phone = $request->input('phone');
        $student->email = $request->input('email');
        $student->image = $fileNameToStore;
        $student->save();

        if (isset($request->courses)) {
            $student->courses()->sync($request->courses);
        } else {
            $student->courses()->sync(array());
        }

        return redirect()->action(
            'StudentsController@show', ['id' => $student->id]
        )->with('success', 'Student Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->courses()->detach();
        $student->delete();
        return redirect(url('/school'))->with('success', 'Student Removed');
    }


}
