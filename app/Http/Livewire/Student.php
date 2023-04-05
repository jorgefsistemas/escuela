<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Student extends Component
{

    public $students;

    public function mount()
    {
        // $this->studens = Student::find($id);
        $this->students = Student::all();
    }

    public function render()
    {

        return view('livewire.student', [ 'students' => $this->students  ]);
    }
}
