<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\User;


use Illuminate\Http\Request;
use App\Course;

class CoursesController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()->role == "manager" || Auth::user()->role == "owner") {
            return view('courses.create');
        } else if (Auth::user()->role == "sales") {
            return view('school.index');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
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


        $course = new Course;
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->image = $fileNameToStore;
        $course->save();
        return redirect()->action(
            'CoursesController@show', ['id' => $course->id]
        )->with('success', 'Course Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        if (Auth::user()->role == "manager" || Auth::user()->role == "owner") {
            $course = Course::find($id);
            return view('courses.edit')->with('course', $course);
        } else if (Auth::user()->role == "sales") {
            $course = Course::find($id);
            return view('courses.show')->with('course', $course);
        }


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
            'description' => 'required',
            'image' => 'image|nullable|max:1999' //those are the thr type of file and kb amount
        ]);


        $course = Course::find($id);

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
            $fileNameToStore = $course->image;
        }


        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->image = $fileNameToStore;
        $course->save();

        return redirect()->action(
            'CoursesController@show', ['id' => $course->id]
        )->with('success', 'Course Update');
        // return redirect(url('/school'))->with('success','Course Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        if (Auth::user()->role == "manager" || Auth::user()->role == "owner") {
            $course = Course::find($id);
            $course->students()->detach();
            $course->delete();
            return redirect(url('/school'))->with('success', 'Course Removed');
        } else if (Auth::user()->role == "sales") {
            $course = Course::find($id);
            return view('courses.show')->with('course', $course);
        }

    }
}
