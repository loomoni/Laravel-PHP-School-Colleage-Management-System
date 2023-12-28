<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Student List";
        $data['getRecord'] = User::getStudent();
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Student";
        return view('admin.student.add', $data);
    }
}
