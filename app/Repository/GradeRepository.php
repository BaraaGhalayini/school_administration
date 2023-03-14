<?php

namespace App\Repository;
use App\Models\Grade;


class GradeRepository implements GradeRepositoryInterface {


    // private $grade_id;

    // private bool $show_table;
    // private bool $updateMode;
    // private $name_ar;
    // private $name_en;
    // private $note;

    
    public function getAllGrades(): \Illuminate\Database\Eloquent\Collection
    {
        return Grade::all();
    }
    public function validateOnly_updated($propertyName){
        $this->validateOnly($propertyName, [
            'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar',
            'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en',
        ]);
    }

    public function getAllData_Edit($id){
        try{
            $this->grade_id = $id;
            $this->show_table = false;
            $this->updateMode = true;
            $grade = Grade::where('id',$id)->first();

            $this->name_ar = $grade->getTranslation('Name_Grade', 'ar');
            $this->name_en = $grade->getTranslation('Name_Grade', 'en');
            $this->note = $grade->note;
        }
        catch (\Exception $e) {
            $this->catchError = $e->getMessage();

        };
    }


}
