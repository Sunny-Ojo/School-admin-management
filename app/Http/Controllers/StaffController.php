<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class StaffController extends Controller
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
        $students = Student::all();
        $teachers = Teacher::all();
        return view('staff.index')->with(['staff' => $staff, 'students' => $students, 'teachers' => $teachers]);

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
        return view('staff.create')->with(['staff' => $staff, 'students' => $students, 'teachers' => $teachers]);

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
            'emailAddress' => 'email|required',
            'passport' => 'image|required',
            'phone' => 'required',
            'role' => 'required',

        ]);
        if ($request->hasFile('passport')) {

            $ppName = $request->file('passport')->getClientOriginalName();
            $ppExt = $request->file('passport')->getClientOriginalExtension();
            $ppNameOnly = pathinfo($ppName, PATHINFO_FILENAME);
            $ppToDb = $ppNameOnly . '_' . time() . '.' . $ppExt;
            $ppPath = $request->file('passport')->storeAs('public/passports', $ppToDb);

        }
        $data = new Staff();

        $data->firstName = $request->firstName;
        $data->lastName = $request->lastName;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->homeAddress = $request->homeAddress;
        $data->emailAddress = $request->emailAddress;
        if ($request->hasFile('passport')) {
            $data->passport = $ppToDb;
        }

        $data->phone = $request->phone;
        $data->role = $request->role;
        $data->save();
        return redirect('/staff')->with('success', 'A new staff has been added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staffs = Staff::find($id);
        $staff = Staff::all();

        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('staff.show')->with(['staffs' => $staffs, 'students' => $students, 'staff' => $staff, 'teachers' => $teachers]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffs = Staff::find($id);
        $staff = Staff::all();

        $students = Student::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('staff.edit')->with(['staff' => $staff, 'students' => $students, 'staffs' => $staffs, 'teachers' => $teachers]);

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
            'emailAddress' => 'required',
            'passport' => 'nullable|',
            'phone' => 'required',
            'role' => 'required',

        ]);
        if ($request->hasFile('passport')) {

            $ppName = $request->file('passport')->getClientOriginalName();
            $ppExt = $request->file('passport')->getClientOriginalExtension();
            $ppNameOnly = pathinfo($ppName, PATHINFO_FILENAME);
            $ppToDb = $ppNameOnly . '_' . time() . '.' . $ppExt;
            $ppPath = $request->file('passport')->storeAs('public/passports', $ppToDb);

        }
        $data = Staff::find($id);
        $data->firstName = $request->firstName;
        $data->lastName = $request->lastName;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->homeAddress = $request->homeAddress;
        $data->emailAddress = $request->emailAddress;
        if ($request->hasFile('passport')) {
            $data->passport = $ppToDb;
        }

        $data->phone = $request->phone;
        $data->role = $request->role;
        $data->save();
        return redirect('/staffs')->with('success', 'update was successful');
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
        $student = Staff::find($id);
        $student->delete();
        return redirect()->back()->with('success', 'Staff has been deleted successfully');
    }

}