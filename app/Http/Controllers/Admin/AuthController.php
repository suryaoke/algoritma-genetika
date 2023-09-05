<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.site.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);

        $attempts = [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($attempts)) {
            $notification = array(
                'message' => 'User Login Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.dashboard')->with($notification);
        }
        $notification = array(
            'message' => 'Email dan Password Salah',
            'alert-type' => 'warning'
        );


        $request->session(); // Change 'danger' to 'alert-danger'

        return back()->with($notification);
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/')->with($notification);
    }
}
