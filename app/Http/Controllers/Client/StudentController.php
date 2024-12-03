<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index () {
        return view('client.students.index');
    }

    public function car_registration(){
        return view(('client.students.car_register'));
    }

    public function bike_registration(){
        return view(('client.students.bike_register'));
    }

    public function schedule(){
        return view('client.students.schedule');
    }

    // Thêm hàm update
    public function edit_schedule(){
        return view('client.students.edit_schedule');
    }
    // *******
}
