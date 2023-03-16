<?php

namespace App\Repository;
use App\Models\Grade;
use App\Models\Classroom;


class GradeRepository implements GradeRepositoryInterface {


    private $grade_id;
    private bool $show_table;
    private bool $updateMode;
    private $name_ar;
    private $name_en;
    private $note;
    // private $id;


    public function getAllGrades()
    {
        return Grade::all();
    }

    public function validateOnly_updated($propertyName){
        $this->validateOnly($propertyName, [
            'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar',
            'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en',
        ]);
    }

    public function Create_Data($data){

        try{
            Grade::create([
                'Name_Grade' => [
                    'ar' => @$data['name_ar'],
                    'en' => @$data['name_en'],
                ],
                'note' => @$data['note'],
            ]);
            session()->flash('add', trans('main_trans.add_alert'));
            return redirect('/grades');
        }

        catch (\Exception $e) {
            return $catchError = $e->getMessage();
        };


    }

    public function getAllData_Edit($id){
        try{
            return Grade::findOrFail($id);
        }
        catch (\Exception $e) {
            return $catchError = $e->getMessage();
        };
    }

    public function Update_Data($id , $data){
        try{
            $grades = Grade::findOrFail($id);

            $grades->update([
                'Name_Grade' => [
                    'ar' => @$data['name_ar'],
                    'en' => @$data['name_en'],
                ],
                'note' => @$data['note'],
            ]);
            // $grade->update($data);
            
            session()->flash('edit', trans('main_trans.edit_alert'));
            return redirect('/grades');
        }

        catch (\Exception $e) {
            return $catchError = $e->getMessage();
        };
    }

    public function Delete_Data($id ){
        $cheak = Classroom::where('Grade_id' , $id )->first();

        if ($cheak == Null){
            Grade::findOrFail($id)->delete();
            session()->flash('delete', trans('main_trans.delete_alert'));
            return redirect('/grades');
        }
        else {
            session()->flash('warning1', trans('grade_trans.delete_close_classroom'));
            return redirect('/grades');
        }
    }

}
