<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

// use Illuminate\Foundation\Auth\AuthenticatesUsers;


class UsersController extends Controller
{
    // use AuthenticatesUsers;

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
        // return view('users.index');

        if (Auth::user()->role == "manager" || Auth::user()->role == "owner") {
            return view('users.index');
        } else {
            return view('school.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('users.create');

        if (Auth::user()->role == "manager" || Auth::user()->role == "owner") {
            return view('users.create');
        } else {
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
        // if(Auth::user()->role != 'owner' && Auth::user()->role != 'manager'){ 
        //     return view('school.index');
        // }


        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
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
        $user = new User;
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->image = $fileNameToStore;
        $user->save();
        // dd($user);
        return redirect(url('/users'))->with('success', 'User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user=User::find($id);
        // return view ('users.show')->with('user',$user);


        if (Auth::user()->role == "owner" || Auth::user()->role == "manager") {
            $user = User::find($id);
        } else {
            return view('school.index');
        }

        if ($user->role == "owner" && Auth::user()->role == "owner") {
            return view('users.show')->with('user', $user);
        } else if ($user->role != "owner") {
            return view('users.show')->with('user', $user);
        } else {
            return view('users.index');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user=User::find($id);
        // return view ('users.edit')->with('user',$user);


        if (Auth::user()->role == "owner" || Auth::user()->role == "manager") {
            $user = User::find($id);
        } else {
            return view('school.index');
        }

        if ($user->role == "owner" && Auth::user()->role == "owner") {
            return view('users.edit')->with('user', $user);
        } else if ($user->role != "owner") {
            return view('users.edit')->with('user', $user);
        } else {
            return view('users.index');
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

        // if(Auth::user()->role == "owner"||Auth::user()->role == "manager"){
        //     $user =User::find($id);
        //     }else{ 
        //         return view('school.index');
        //     }


        $this->validate($request, [

            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
            'image' => 'image|nullable|max:1999' //those are the thr type of file and kb amount
        ]);


        $user = User::find($id);
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
            $fileNameToStore = $user->image;
        }


        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->image = $fileNameToStore;
        $user->save();
        return redirect(url('/users'))->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  $user=User::find($id);
        // $user->delete();
        // return redirect(url('/users'))->with('success','User Removed');


        if (Auth::user()->role == "owner" || Auth::user()->role == "manager") {
            $user = User::find($id);
        } else {
            return view('school.index');
        }


        if (Auth::user()->id == $id) {

            return view('users.show')->with('user', $user);
        }

        if ($user->role == "owner") {
            return view('users.index');
        } else if ($user->role != "owner") {
            $user->delete();
            return redirect(url('/users'))->with('success', 'User Removed');
        } else {
            return view('users.index');
        }


    }
}
