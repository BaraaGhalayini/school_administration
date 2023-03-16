<?php

namespace App\Repository;

use App\Repository\GradeRepository;


Interface GradeRepositoryInterface {

    public function getAllGrades();
    
    public function Create_Data($data);

    public function getAllData_Edit($id);
    
    public function Update_Data($id , $data);

    public function Delete_Data($id);

    
}
