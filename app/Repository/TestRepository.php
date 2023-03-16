<?php

namespace App\Repository;
use App\Models\Grade;


class TestRepository implements TestRepositoryInterface {

    public function getAll()
    {
        return Grade::all();
    }

    public function getById($id)
    {
        return Grade::findOrFail($id);
    }

    public function create($data)
    {
        return Grade::create($data);
    }

    public function update_data($id, $data)
    {
        $grade = Grade::findOrFail($id);
        $grade->update($data);
        return $grade;
    }

    public function delete($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
    }

}
