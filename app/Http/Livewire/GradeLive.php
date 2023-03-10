<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Grade;

use Livewire\Component;




class GradeLive extends Component
{   

    public $show_table = true ,
    $name_ar,
    $name_en,
    $note,
    $grade_id,
    $updateMode = false;


    public function render()
    {
        $grades = Grade::all();
        // $grades = DB::table('Grades')->get();
        return view('livewire.grades.grade-live' , compact('grades') );
    }

    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);

        $this->validateOnly($propertyName, [
            'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar',
            'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en',
        ]);
    }

    public function showformadd()
    {
        $this->show_table = false;
        
    }
    


    public function Submit_add()
    {

        try{
            $this->validate([

                
                'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar',
                'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en',
            ]);

            // Grade::create([
            //     'name_ar' => $this->name_ar,
            //     'name_en' => $this->name_en,
            // ]);

            Grade::create([
                'Name_Grade' => [
                    'ar' => $this->name_ar,
                    'en' => $this->name_en,
                ],
                'note' => $this->note,
            ]);


            session()->flash('add', trans('main_trans.add_alert'));
            return redirect('/grades');
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }


    public function showformedit($id)
    {
        try{
            $this->grade_id = $id;
            $this->show_table = false;
            $this->updateMode = true;

            $grade = Grade::where('id',$id)->first();

            $this->name_ar = $grade->getTranslation('Name_Grade', 'ar');
            $this->name_en = $grade->getTranslation('Name_Grade', 'en');
            // $this->name_ar = $grade->name_ar;
            // $this->name_en = $grade->name_en;

            $this->note = $grade->note;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

    }



    public function Submit_edit()
    {

        try{
            $id = $this->grade_id;

            if ($id){
                $this->validate([

                    'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar,'.$id,
                    'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en,'.$id,
                ]);

                $Grade = Grade::find($id);

                $Grade->update([
                    'Name_Grade' => [
                        'ar' => $this->name_ar,
                        'en' => $this->name_en,
                    ],
                    'note' => $this->note,
                ]);

                session()->flash('edit', trans('main_trans.edit_alert'));
                return redirect('/grades');
            }        
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }


    public function delete($id)
    {
        
        Grade::findOrFail($id)->delete();
        session()->flash('delete', trans('main_trans.delete_alert'));
        return redirect('/grades');



    
    }


}
