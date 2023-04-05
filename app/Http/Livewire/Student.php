<?php

namespace App\Http\Livewire;

use App\Models\Estudiante;
use Livewire\Component;


class Student extends Component
{

    public $students;

    public function mount()
    {
        // $this->studens = Student::find($id);
        $this->students = Estudiante::all();
        //  dd($this->students);
    }

    public function render()
    {


        return view('livewire.student', [ 'students' =>  $this->students ]);
    }
    public function agregar()
    {
        return view('addstudent');
    }
}
