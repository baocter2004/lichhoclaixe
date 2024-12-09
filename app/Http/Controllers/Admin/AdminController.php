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

    public function search()
    {
        try {
            $searchKey = request()->input('search');
            $searchType = request()->input('search_type');
            $query = null;
            if($searchType === 'instructors') {
                $query =  Instructor::with('user')
                ->whereHas('user', function ($query) use ($searchKey) {
                    $query->where('first_name', 'LIKE', '%' . $searchKey . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $searchKey . '%');
                }); 
            } else if($searchType === 'students') {
                $query =  Student::with('user')
                ->whereHas('user', function ($query) use ($searchKey) {
                    $query->where('first_name', 'LIKE', '%' . $searchKey . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $searchKey . '%');
                }); 
            } else {
                return back()->with('error','loại tìm kiếm không hợp lệ');
            }

            $results = $query->paginate(5);
        
            return view('admin.search.search-result', compact('results'));
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return back()->with('error','có lỗi rồi !!!');
        }
    }
}
