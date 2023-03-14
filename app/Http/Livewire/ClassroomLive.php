<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Classroom;
use App\Models\Grade;

//Don't use Repository

class ClassroomLive extends Component
{   

    public $show_table = true ,
    $Name_Class,
    $classroom_id,
    $classrooms_ar,
    $classrooms_en,
    $Grade_id,
    $updateMode = false;



    public function render()
    {    
        $classrooms = Classroom::all();
        $grades = Grade::all();

        return view('livewire.classrooms.classroom-live', compact('classrooms' ,'grades') );
    }

    
    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);

        $this->validateOnly($propertyName, [ 
            'classrooms_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:classrooms,Name_Class->ar',
            'classrooms_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:classrooms,Name_Class->en',
            'Grade_id' => 'required',
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
                'classrooms_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:classrooms,Name_Class->ar',
                'classrooms_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:classrooms,Name_Class->en',
                'Grade_id' => 'required',
            ]);

            Classroom::create([
                'Name_Class' => [
                    'ar' => $this->classrooms_ar,
                    'en' => $this->classrooms_en,
                ],
                'Grade_id' => $this->Grade_id,
            ]);

            session()->flash('add', trans('main_trans.add_alert'));
            return redirect('/classrooms');
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }


    public function showformedit($id)
    {
        try{
            $this->classroom_id = $id;
            $this->show_table = false;
            $this->updateMode = true;

            $classrooms = Classroom::where('id',$id)->first();

            $this->classrooms_ar = $classrooms->getTranslation('Name_Class', 'ar');
            $this->classrooms_en = $classrooms->getTranslation('Name_Class', 'en');
            
            $this->Grade_id = $classrooms->Grade_id;
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

    }



    public function Submit_edit()
    {

        try{
            $id = $this->classroom_id;

            if ($id){
                $this->validate([
                    'classrooms_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:classrooms,Name_Class->ar'.$id,
                    'classrooms_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:classrooms,Name_Class->en'.$id,

                    'Grade_id' => 'required',
                ]);

                $classrooms = Classroom::find($id);

                $classrooms->update([
                    'Name_Class' => [
                        'ar' => $this->classrooms_ar,
                        'en' => $this->classrooms_en,
                    ],
                    'Grade_id' => $this->Grade_id,
                ]);


                session()->flash('edit', trans('main_trans.edit_alert'));
                return redirect('/classrooms');
            }        
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }


    public function delete($id)
    {
        
        Classroom::findOrFail($id)->delete();
        session()->flash('delete', trans('main_trans.delete_alert'));
        return redirect('/classrooms');

    }

}
