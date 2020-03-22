<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

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
        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('students.index')->with(['students' => $students, 'teachers' => $teachers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('students.create')->with(['students' => $students, 'teachers' => $teachers]);

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
        $data = new Student;

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
        $data->StudentsCourse = $request->course;
        $data->save();
        return redirect('/students')->with('success', 'update was successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('students.show')->with(['students' => $students, 'student' => $student, 'teachers' => $teachers]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('students.edit')->with(['students' => $students, 'student' => $student, 'teachers' => $teachers]);

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
        $data = Student::find($id);
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
        $data->StudentsCourse = $request->course;
        $data->save();
        return redirect('/students')->with('success', 'update was successful');
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
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->withErrors('Student has been deleted successfully');
    }

}