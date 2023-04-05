<?php

namespace App\Http\Livewire;

use App\Models\Materia;
use Livewire\Component;

class Subjects extends Component
{

    public $subject;

    public function mount()
    {
        // $this->studens = Student::find($id);
        $this->subject = Materia::all();
        // dd($this->subject);
    }

    public function render()
    {
        return view('livewire.subjects', [ 'subjects' =>  $this->subject ]);
    }
}
