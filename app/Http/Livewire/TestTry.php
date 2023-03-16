<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Repository\TestRepositoryInterface;
use App\Repository\TestRepository;


class TestTry extends Component
{

    protected $gradesRepository;

    // public $test_ooo;
    public $name;
    public $selectedGrade;
    public $grades;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function mount(TestRepositoryInterface $gradesRepository)
    {
        $this->grades = $gradesRepository->getAll();

    }


    public function render(TestRepositoryInterface $gradesRepository)
    {   
        // $grades = $this->mount($gradesRepository);
        $grades = $gradesRepository;

        return dd($grades);

        return view('livewire.test-try', compact('grades') );
    }


    public function create(TestRepositoryInterface $gradesRepository)
    {
        $data = $this->validate();
        $gradesRepository->create($data);
        $this->reset();
        $this->mount($gradesRepository);
    }

    public function edit($id, TestRepositoryInterface $gradesRepository)
    {
        $this->selectedGrade = $gradesRepository->getById($id);
        $this->name = $this->selectedGrade->name;
    }

    public function update(TestRepositoryInterface $gradesRepository)
    {
        $data = $this->validate();
        $gradesRepository->update_data($this->selectedGrade->id, $data);
        $this->reset();
        $this->mount($gradesRepository);
    }


}
