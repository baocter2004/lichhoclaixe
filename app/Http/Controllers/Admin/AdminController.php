<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Schedule;
use App\Models\Session;
use App\Models\Student;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $students = Student::latest('id')->paginate(5);
        $instructors = Instructor::latest('id')->paginate(5);

        $sessions = Session::latest('id')->get();
        $schedules = Schedule::latest('id')->paginate(5);

        return view(
            'admin.dashboard',
            compact([
                'students',
                'instructors',
                'sessions',
                'schedules'
            ])
        );
    }
}
