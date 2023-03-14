<?php

namespace App\Repository;
use App\Models\Grade;


class GradeRepository implements GradeRepositoryInterface {


    private $grade_id;

    private bool $show_table;
    private bool $updateMode;
    private $name_ar;
    private $name_en;
    private $note;
    private $id;

    
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

    public function getAllData_Edit($id , GradeRepositoryInterface $Grade ){
        try{
            $Grade->grade_id = $id;
            $Grade->show_table = false;
            $Grade->updateMode = true;
            $grade = Grade::where('id',$id)->first();

            $Grade->name_ar = $grade->getTranslation('Name_Grade', 'ar');
            $Grade->name_en = $grade->getTranslation('Name_Grade', 'en');
            $Grade->note = $grade->note;
        }
        catch (\Exception $e) {
            $Grade->catchError = $e->getMessage();

        };
    }


}
