<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Classroom;


class ClassroomLive extends Component
{   

    public $show_table = true ,
    $Name_Class,
    $classroom_id,
    $Grade_id,
    $updateMode = false;



    public function render()
    {    
        $classrooms = Classroom::all();

        return view('livewire.classrooms.classroom-live', compact('classrooms') );
    }

    
    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);

        $this->validateOnly($propertyName, [
            'Name_Class' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:classrooms',
            'Grade_id' => 'required|unique:classrooms',
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
                'Name_Class' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:classrooms',
                'Grade_id' => 'required|unique:classrooms',
            ]);

            Classroom::create([
                'Name_Class' => $this->Name_Class,
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

            // $this->Name_Class = $classrooms->getTranslation('Name_Class', 'ar');
            // $this->classroom_id = $classrooms->getTranslation('classroom_id', 'en');
            $this->Name_Class = $classrooms->Name_Class;
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
                    'Name_Class' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:classrooms,Name_Class,'.$id,
                    'Grade_id' => 'required|unique:classrooms,classroom_id,'.$id,
                ]);

                $classrooms = Classroom::find($id);

                $classrooms->update([
                    'Name_Class' => $this->Name_Class,
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
