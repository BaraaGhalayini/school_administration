<?php

namespace App\Repository;


Interface ParentsRepositoryInterface {

    public function getAllParents();
    
    public function Create_Data($data);

    public function getAllData_Edit($id);
    
    public function Update_Data($id , $data);

    public function Delete_Data($id);

}