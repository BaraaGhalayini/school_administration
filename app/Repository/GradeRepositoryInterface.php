<?php

namespace App\Repository;

use App\Repository\GradeRepository;


Interface GradeRepositoryInterface {

    public function getAllGrades();

    public function validateOnly_updated($propertyName);

    public function getAllData_Edit($id);

}
