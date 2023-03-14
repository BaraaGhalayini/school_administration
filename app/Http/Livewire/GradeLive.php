<?php

namespace App\Http\Livewire;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

use App\Models\Grade;
use App\Repository\GradeRepository;
use App\Repository\GradeRepositoryInterface;


class GradeLive extends Component
{

    protected $Grade;

    public function mount( GradeRepositoryInterface $Grade ){
        $this->Grade = $Grade;
    }
//    public function __construct( GradeRepositoryInterface  $Grade)
//    {
//      $this->Grade = $Grade;
//    }


    public $show_table = true ,
    $name_ar,
    $name_en,
    $note,
    $grade_id,
    $updateMode = false;


    public function render(GradeRepositoryInterface $Grade): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $grades = $this->Grade->getAllGrades();
        // $grades =  $this->Grade->getAllGrades()->dd();
        // $grades =  Grade::all();

        return view('livewire.grades.grade-live' , compact('grades') );
    }





    public function updated($propertyName)
    {

        $this->validateOnly($propertyName, [
            'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar',
            'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en',
        ]);
    }

    public function showformadd( )
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


    public function showformedit( $id  , GradeRepositoryInterface $Grade )
    {
        $Grade->getAllData_Edit($id);
    }



    public function Submit_edit(GradeRepositoryInterface $Grade)
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


    public function delete($id , GradeRepositoryInterface $Grade): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {

        Grade::findOrFail($id)->delete();
        session()->flash('delete', trans('main_trans.delete_alert'));
        return redirect('/grades');




    }


}
