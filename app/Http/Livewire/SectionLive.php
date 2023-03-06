<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Section;
use App\Models\Grade;

class SectionLive extends Component
{

    public $show_table = true ,
    $Grades = [1 ,2 ,3],
    $name_ar,
    $name_en,
    $note,
    $section,
    $updateMode = false;


    public function render()
    {   
        $sections = Section::all();
        $grades = Grade::all();
        return view('livewire.sections.section-live', compact('sections','grades') );
    }


    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);

        $this->validateOnly($propertyName, [
            'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Sections,Name_Section->ar',
            'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Sections,Name_Section->en',
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

                
                'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Sections,Name_Section->ar',
                'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Sections,Name_Section->en',
            ]);

            // Section::create([
            //     'name_ar' => $this->name_ar,
            //     'name_en' => $this->name_en,
            // ]);


            Section::create([
                'Name_Section' => [
                    'ar' => $this->name_ar,
                    'en' => $this->name_en,
                ],
                'note' => $this->note,
            ]);


            session()->flash('add', trans('main_trans.add_alert'));
            return redirect('/Sections');
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

            $grade = Section::where('id',$id)->first();

            $this->name_ar = $grade->getTranslation('Name_Section', 'ar');
            $this->name_en = $grade->getTranslation('Name_Section', 'en');
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
            $id = $this->section_id;

            if ($id){
                $this->validate([

                    'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Sections,Name_Section->ar,'.$id,
                    'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Sections,Name_Section->en,'.$id,
                ]);

                $Grade = Section::find($id);

                $Grade->update([
                    'Name_Section' => [
                        'ar' => $this->name_ar,
                        'en' => $this->name_en,
                    ],
                    'note' => $this->note,
                ]);

                session()->flash('edit', trans('main_trans.edit_alert'));
                return redirect('/Sections');
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
        return redirect('/Sections');



    
    }
}
