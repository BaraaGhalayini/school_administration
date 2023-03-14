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

    public $show_table = true ,
    $name_ar,
    $name_en,
    $note,
    $grade_id,
    $updateMode = false;


    public function mount( GradeRepositoryInterface $Grade ){
        $this->Grade = $Grade;
    }

    public function render(GradeRepositoryInterface $Grade)
    {
        $grades =  $Grade->getAllGrades();
        return view('livewire.grades.grade-live' , compact('grades') );
    }

    //تحديث دوري
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar',
            'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en',
        ]);
    }

    //Show Create Form
    public function showformadd( )
    {
        $this->show_table = false;
    }

    //Create
    public function Submit_add( GradeRepositoryInterface $Grade)
    {
        $Grade->Create_Grade();
    }

    //Show Edit Form
    public function showformedit( $id  , GradeRepositoryInterface $Grade )
    {
        $Grade->getAllData_Edit($id);
    }


    //Edit
    public function Submit_edit(GradeRepositoryInterface $Grade)
    {
        $Grade->Submit_Edit_Grade($id);
    }

    //Delete
    public function delete($id , GradeRepositoryInterface $Grade)
    {
        $Grade->Delete_Grade($id);
    }


}
