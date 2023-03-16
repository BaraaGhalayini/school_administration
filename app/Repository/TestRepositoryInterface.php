<?php

namespace App\Repository;

use App\Repository\TestRepository;


Interface TestRepositoryInterface {

    public function getAll();
    public function getById($id);
    public function create($data);
    public function update_data($id, $data);
    public function delete($id);

}
