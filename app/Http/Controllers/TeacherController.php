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
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('Teachers.create',compact('specializations','genders'));
    }

    public function store(Request $request)
    {   
        
        // return $request;
        return $this->Teacher->StoreTeachers($request);
    }

    

    public function show(Teacher $teacher)
    {
        //
    }


    public function edit(Teacher $teacher)
    {
    
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
