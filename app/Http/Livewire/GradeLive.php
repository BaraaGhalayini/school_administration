<?php

namespace App\Http\Livewire;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

use App\Models\Grade;
use App\Models\Classroom;
use App\Repository\GradeRepository;
use App\Repository\GradeRepositoryInterface;


class GradeLive extends Component
{

    protected $Grade;

    public $selectedGrade;

    public $show_table = true ,
    $name_ar,
    $name_en,
    $note,
    $grades,
    $SendUpdate,
    $test,
    $grade_id,
    $data,
    $Confirm_Delete_Show = false,
    $updateMode = false;




    protected $rules = [
        'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar',
        'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en',
    ];


    public function mount(GradeRepositoryInterface $Grade)
    {
        $this->grades = $Grade->getAllGrades();
    }

    public function render(GradeRepositoryInterface $Grade)
    {
        // $grades = $this->mount($Grade);
        $grades1 = $Grade->getAllGrades();

        // dd($grades);
        // $grades =  Grade::all();
        
        return view('livewire.grades.grade-live' , compact('grades1') );
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

    //Show Confirm_Delete Form
    public function Confirm_Delete( )
    {
        $this->Confirm_Delete_Show = true;
    }


    //Create
    public function Submit_add(GradeRepositoryInterface $Grade)
    {
        $this->validate();

        $data = [
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'note' => $this->note,
        ];

        $SendCreate = $Grade->Create_Data($data);
        // dd($SendUpdate);
        $this->reset();
    }

    //Show Edit Form
    public function ShowFormEdit( $id,  GradeRepositoryInterface $Grade)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $this->grade_id = $id;
        
        $ShowSelectedGrade = $Grade->getAllData_Edit($id);
        // dd($id);

        //تعريف المتغيرات بعد جلبها من الجدول
        $this->name_ar = $ShowSelectedGrade->getTranslation('Name_Grade', 'ar');
        $this->name_en = $ShowSelectedGrade->getTranslation('Name_Grade', 'en');
        $this->note = $ShowSelectedGrade->note;
    }


    //Edit
    public function Submit_edit(GradeRepositoryInterface $Grade)
    {   
        $this->validate([
            'name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u|unique:Grades,Name_Grade->ar,'.$this->grade_id,
            'name_en' => 'required|string|regex:/^[A-Za-z]+$/i|unique:Grades,Name_Grade->en,'.$this->grade_id,
        ]);

        $data = [
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'note' => $this->note,
        ];
        // $data = $this->validate(); //للتحقق
        // dd($SendUpdate);
        $SendUpdate = $Grade->Update_Data($this->grade_id, $data);
        $this->reset();

    }

    //Delete
    public function delete($id, GradeRepositoryInterface $Grade)
    {
        
        $Delete_Data = $Grade->Delete_Data($id);
        $this->reset();



    }


}
