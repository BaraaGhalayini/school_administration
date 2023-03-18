<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TeacherRequest;


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
        $Teachers = $this->Teacher->GetAllTeachers();
        return view ('Teachers.Teachers' , compact('Teachers'));
    }


    public function create()
    {
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        // dd($genders);
        return view('Teachers.create',compact('specializations','genders'));
    }

    public function store(TeacherRequest $request)
    {
        // return $request;
        // $this->validate();
        // dd($request);
        $validated = $request->validated(); //يتم عمل تحقق عبر الملف الخاص
        return $this->Teacher->StoreTeacher($request);
    }



    public function show(Teacher $teacher)
    {
        //
    }


    public function edit( $id)
    {
        // $this->validate($id);
        $Teachers = $this->Teacher->EditTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('Teachers.edit',compact('Teachers','specializations','genders'));        
    }

    public function update(TeacherRequest $request)
    {
        $request->validated($request);
        return $this->Teacher->UpdateTeachers($request);        
    }


    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}
