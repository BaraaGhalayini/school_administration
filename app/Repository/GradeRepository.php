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


    public function Create_Grade( GradeRepositoryInterface $Grade ){

        try{
            $Grade->validate([


                'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar',
                'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en',
            ]);

            // Grade::create([
            //     'name_ar' => $this->name_ar,
            //     'name_en' => $this->name_en,
            // ]);

            Grade::create([
                'Name_Grade' => [
                    'ar' => $Grade->name_ar,
                    'en' => $Grade->name_en,
                ],
                'note' => $Grade->note,
            ]);


            session()->flash('add', trans('main_trans.add_alert'));
            return redirect('/grades');
        }

        catch (\Exception $e) {
            $Grade->catchError = $e->getMessage();
        };

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



    public function Submit_Edit_Grade($id , GradeRepositoryInterface $Grade ){
        
        try{
            $id = $thGradeis->grade_id;

            if ($id){
                $Grade->validate([

                    'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar,'.$id,
                    'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en,'.$id,
                ]);

                $Grade = Grade::find($id);

                $Grade->update([
                    'Name_Grade' => [
                        'ar' => $Grade->name_ar,
                        'en' => $Grade->name_en,
                    ],
                    'note' => $Grade->note,
                ]);

                session()->flash('edit', trans('main_trans.edit_alert'));
                return redirect('/grades');
            }
        }

        catch (\Exception $e) {
            $Grade->catchError = $e->getMessage();
        };

    
    
    }


    public function Delete_Grade($id , GradeRepositoryInterface $Grade ){
        Grade::findOrFail($id)->delete();
        session()->flash('delete', trans('main_trans.delete_alert'));
        return redirect('/grades');
    }

}
