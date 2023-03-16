<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Section;
use App\Models\Grade;
use App\Models\Classroom;

class SectionLive extends Component
{

    public $show_table = true ,
    // $Grades = [1 ,2 ,3],
    $Status_Defulte = 1,
    $Status,
    $name_ar,
    $name_en,
    $name_grade,
    $name_class,
    $classrooms,
    $section,
    $updateMode = false;



    public function render()
    {   
        $grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        // $classrooms = Classroom::all();

        return view('livewire.sections.section-live', compact('grades','list_Grades') );
    }




    public function mount()
    {
        if ($this->name_grade !='') {
            $this->classrooms = Classroom::where('Grade_id', $this->name_grade)->get();
        }else{

            $this->classrooms = [];
        }
    }

    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);

        $this->validateOnly($propertyName, [
            'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Sections,Name_Section->ar',
            'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Sections,Name_Section->en',
            'name_grade' => 'required',
            'name_class' => 'required',

            
        ]);

        // if ($this->check('status_check')){

        //     $Status === 1;
        // }   

        

        $this->classrooms = Classroom::where('Grade_id', $this->name_grade)->get();
        // dd('?');
    }

    public function showformadd()
    {
        $this->show_table = false;

    }
    


    public function Submit_add()
    {

        try{
            $this->validate([

                'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Sections,Name_Section->ar',
                'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Sections,Name_Section->en',
                'name_grade' => 'required',
                'name_class' => 'required',
            ]);


            Section::create([
                'Name_Section' => [
                    'ar' => $this->name_ar,
                    'en' => $this->name_en,
                ],
                'Grade_id' => $this->name_grade,
                'Class_id' => $this->name_class,
                'Status' => $this->Status_Defulte,
            ]);


            session()->flash('add', trans('main_trans.add_alert'));
            return redirect()->route('Sections');
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }


    public function showformedit($id)
    {

        
        try{
            $this->section_id = $id;
            $this->show_table = false;
            $this->updateMode = true;

            $section = Section::where('id',$id)->first();
            
            $this->name_ar = $section->getTranslation('Name_Section', 'ar');
            $this->name_en = $section->getTranslation('Name_Section', 'en');
            // $this->name_ar = $section->name_ar;
            // $this->name_en = $section->name_en;

            $this->name_grade = $section->Grade_id;
            $this->name_class = $section->Class_id;
            $this->Status = $section->Status;


        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

    }
    


    public function Submit_edit()
    {
        
        try{
            $id = $this->section_id;

            if ($id){
                $this->validate([

                    'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Sections,Name_Section->ar,'.$id,
                    'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Sections,Name_Section->en,'.$id,
                    'name_grade' => 'required',
                    'name_class' => 'required',
                ]);

                $section = Section::find($id);

                // $Status = $this->Status;

                // $Status = 1 ? 1 : 2;

                if ($this->Status === 1) {
                    $Status = 1 ;
                }else{

                    $Status = 2 ;
                }


                $section->update([
                    'Name_Section' => [
                        'ar' => $this->name_ar,
                        'en' => $this->name_en,
                    ],
                    'Grade_id' => $this->name_grade,
                    'Class_id' => $this->name_class,
                    'Status' => $Status,
                ]);

                session()->flash('edit', trans('main_trans.edit_alert'));
                return redirect()->route('Sections');
            }        
        }

        catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }


    public function delete($id)
    {
        
        Section::findOrFail($id)->delete();
        session()->flash('delete', trans('main_trans.delete_alert'));
        return redirect()->route('Sections');

    }










}
