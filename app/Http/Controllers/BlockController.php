<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use DB;

class BlockController extends Controller
{
    //
    public function blockedStudent($id)
    {
        $student = Student::find($id);
        $id = $student->id;
        $block = DB::update('update students set blocked_at = ? where id = ?', [Now(), $id]);
        if ($block) {
            return redirect()->back()->withErrors('Student has successfully been blocked, He/She willl no longer have access to his portal ');

        } else {
            return redirect()->back()->withErrors('error occured');

        }
    }
    public function unblockedStudent($id)
    {
        $student = Student::find($id);
        $id = $student->id;
        $block = DB::update('update students set blocked_at = ? where id = ?', ['', $id]);
        if ($block) {
            return redirect()->back()->withErrors('Student has successfully been unblocked.');

        } else {
            return redirect()->back()->withErrors('error occured');

        }
    }
    public function blockedTeacher($id)
    {
        $teacher = Teacher::find($id);
        $id = $teacher->id;
        $block = DB::update('update teachers set blocked_at = ? where id = ?', [Now(), $id]);
        if ($block) {
            return redirect()->back()->withErrors('Teacher has successfully been blocked, He/She willl no longer have access to his portal ');

        } else {
            return redirect()->back()->withErrors('error occured');

        }
    }
    public function unblockedTeacher($id)
    {
        $teacher = Teacher::find($id);
        $id = $teacher->id;
        $block = DB::update('update teachers set blocked_at = ? where id = ?', ['', $id]);
        if ($block) {
            return redirect()->back()->withErrors('Teacher has successfully been unblocked. ');

        } else {
            return redirect()->back()->withErrors('error occured');

        }
    }

}