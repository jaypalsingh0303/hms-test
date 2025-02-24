<?php


namespace App\Http\Controllers;


use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;

class DashboardController extends Controller
{
    public function user_dashboard()
    {
        return view("user.dashboard");
    }

    public function patient_dashboard()
    {
        return view("patient.dashboard");
    }

    public function doctor_dashboard()
    {
        return view("doctor.dashboard");
    }

    public function admin_dashboard()
    {
        $doctor = Doctor::count();
        $patient = Patient::count();
        $user = User::count();

        return view("admin.dashboard", compact("doctor", "patient", "user"));
    }
}
