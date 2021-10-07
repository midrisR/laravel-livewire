<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class InputForm extends Component
{
    public $label, $model;
    
    public function render()
    {
        return view('livewire.form.input-form');
    }
}