<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
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
        $staff = Staff::all();

        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('teachers.index')->with(['staff' => $staff, 'students' => $students, 'teachers' => $teachers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Staff::all();

        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('teachers.create')->with(['staff' => $staff, 'students' => $students, 'teachers' => $teachers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'homeAddress' => 'required',
            'fathersName' => 'required',
            'emailAddress' => 'email|required',
            'passport' => 'image|required',
            'phone' => 'required',
            'course' => 'required',

        ]);
        if ($request->hasFile('passport')) {

            $ppName = $request->file('passport')->getClientOriginalName();
            $ppExt = $request->file('passport')->getClientOriginalExtension();
            $ppNameOnly = pathinfo($ppName, PATHINFO_FILENAME);
            $ppToDb = $ppNameOnly . '_' . time() . '.' . $ppExt;
            $ppPath = $request->file('passport')->storeAs('public/passports', $ppToDb);

        }
        $data = new Teacher;

        $data->firstName = $request->firstName;
        $data->lastName = $request->lastName;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->homeAddress = $request->homeAddress;
        $data->fathersName = $request->fathersName;
        $data->emailAddress = $request->emailAddress;
        if ($request->hasFile('passport')) {
            $data->passport = $ppToDb;
        }

        $data->phone = $request->phone;
        $data->course = $request->course;

        $data->save();
        return redirect('/teachers')->with('success', ' A new Teacher  has been created successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Teacher::find($id);
        $staff = Staff::all();

        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('teachers.show')->with(['staff' => $staff, 'students' => $students, 'student' => $student, 'teachers' => $teachers]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $staff = Staff::all();

        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('teachers.edit')->with(['staff' => $staff, 'students' => $students, 'teacher' => $teacher, 'teachers' => $teachers]);

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

        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'homeAddress' => 'required',
            'fathersName' => 'required',
            'emailAddress' => 'required',
            'passport' => 'nullable|',
            'phone' => 'required',
            'course' => 'required',

        ]);
        if ($request->hasFile('passport')) {

            $ppName = $request->file('passport')->getClientOriginalName();
            $ppExt = $request->file('passport')->getClientOriginalExtension();
            $ppNameOnly = pathinfo($ppName, PATHINFO_FILENAME);
            $ppToDb = $ppNameOnly . '_' . time() . '.' . $ppExt;
            $ppPath = $request->file('passport')->storeAs('public/passports', $ppToDb);

        }
        $data = Teacher::find($id);
        $data->firstName = $request->firstName;
        $data->lastName = $request->lastName;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->homeAddress = $request->homeAddress;
        $data->fathersName = $request->fathersName;
        $data->emailAddress = $request->emailAddress;
        if ($request->hasFile('passport')) {
            $data->passport = $ppToDb;
        }

        $data->phone = $request->phone;
        $data->course = $request->course;

        $data->save();
        return redirect('/teachers')->with('success', 'update was successful');
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
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('/teachers')->withErrors('Teacher has been deleted successfully');
    }
}