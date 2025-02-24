<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function user_login()
    {
        return view("auth.login");
    }

    public function user_login_submit(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('user/dashboard')->with('success', 'Login success');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function user_logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("auth.user.login")->with('success', 'Logout success!');
    }

    public function patient_login()
    {
        return view("auth.patient.login");
    }

    public function patient_login_submit(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::guard('patient')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('patient/dashboard')->with('success', 'Login success');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function patient_logout(Request $request)
    {
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("auth.patient.login")->with('success', 'Logout success!');
    }

    public function doctor_login()
    {
        return view("auth.doctor.login");
    }

    public function doctor_login_submit(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::guard('doctor')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('doctor/dashboard')->with('success', 'Login success');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function doctor_logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("auth.doctor.login")->with('success', 'Logout success!');
    }

    public function admin_login()
    {
        return view("auth.admin.login");
    }

    public function admin_login_submit(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard')->with('success', 'Login success');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function admin_logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("auth.admin.login")->with('success', 'Logout success!');
    }
}
