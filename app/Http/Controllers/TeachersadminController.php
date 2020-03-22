<?php

namespace App\Http\Controllers;

use App\Content;
use App\Student;
use Illuminate\Http\Request;

class TeachersadminController extends Controller
{
    public function contruct()
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
        $students = Student::where('studentsCourse', 'computer science')->get();
        return view('teachersadmin.index')->with('students', $students);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::where('studentsCourse', 'computer science')->get();
        return view('teachersadmin.content')->with('students', $students);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required|min:5|max:20',
            'content' => 'required',
            'files' => 'nullable',
        ]);
        if ($request->hasFile('uploads')) {
            $file = $request->file('uploads')->getClientOriginalName();
            $fileExt = $request->file('uploads')->getClientOriginalExtension();
            $filename = pathinfo($file, PATHINFO_FILENAME);

            $fileToDb = $filename . '_' . time() . '.' . $fileExt;
            $path = $request->file('uploads')->storeAs('public/uploads', $fileToDb);
            // } else {
            // return redirect()->back()->with('error', 'The format of the file is not supported');

        }
        //     return 'fail';
        // }
        $courseFile = new Content();
        $courseFile->topic = $request->topic;
        $courseFile->content = $request->content;
        $courseFile->files = $request->uploads;
        if ($request->hasFile('uploads')) {
            $courseFile->files = $fileToDb;
        }
        $courseFile->save();
        return redirect('/teachersadmin')->with('success', 'New content has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}