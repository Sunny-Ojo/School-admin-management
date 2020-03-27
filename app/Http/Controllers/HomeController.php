<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Student;
use App\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $staff = Staff::all();
        $students = Student::all();
        $teachers = Teacher::all();
        return view('admin.index')->with(['staff' => $staff, 'students' => $students, 'teachers' => $teachers]);

    }
}