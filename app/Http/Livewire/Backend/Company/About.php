<?php

namespace App\Http\Livewire\Backend\Company;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.backend.company.about')->layout('layouts.index');
    }
}