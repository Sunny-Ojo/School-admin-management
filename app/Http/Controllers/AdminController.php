<?php

namespace App\Http\Controllers;

use App\Teacher;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function teacherslogin()
    {
        return view('teacherslogin');
    }
    public function loginteacher(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->email;
        $pass = $request->password;
        $password = sha1($pass);

        //    checking if the user is a teacher and exists
        $checkUser = DB::select('select * from teachers where emailAddress = ? && password = ?', [$email, $password]);
        if ($checkUser == true) {
            $user = Teacher::where('emailAddress', $email)->first();
            if ($user->blocked()) {
                return redirect('/')->with('error', 'Sorry, you have been blocked from accessing your Portal.' . "<br>" . ' Please contact the Admin');
            } else {
                return redirect('/teachersadmin');
            }
        } else {
            return redirect()->back()->with('error', 'Incorrect login details ');
        }

    }
}