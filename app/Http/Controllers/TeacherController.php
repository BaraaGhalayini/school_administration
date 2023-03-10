<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Teacher;
use App\Repository\TeacherRepositoryInterface;



class TeacherController extends Controller
{

    protected $Teacher;

    public function __construct( TeacherRepositoryInterface  $Teacher)
    {   
        $this->Teacher = $Teacher;
    }

    public function index()
    {

        $Teachers = $this->Teacher->getAllTeachers();

        return view ('Teachers.Teachers' , compact('Teachers'));

    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    

    public function show(Teacher $teacher)
    {
        //
    }


    public function edit(Teacher $teacher)
    {
        //
    }

    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    
    public function destroy(Teacher $teacher)
    {
        //
    }
}
