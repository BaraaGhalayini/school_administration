<?php

namespace App\Repository;


Interface TeacherRepositoryInterface {

    public function GetAllTeachers();

    // Get specialization
    public function Getspecialization();

    // Get Gender
    public function GetGender();

    // StoreTeachers
    public function StoreTeacher($request);

    // StoreTeachers
    public function EditTeachers($id);

    // UpdateTeachers.
    public function UpdateTeachers($request);

    // DeleteTeachers
    public function DeleteTeachers($request);

}