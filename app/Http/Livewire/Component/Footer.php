<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Employe;

class Footer extends Component
{
    public $show = false;

    public function openChat()
    {
        $this->show = !$this->show;
    }
    
    public function render()
    {
        return view('livewire.component.footer', [
            'employes'=>Employe::with('role')->get()
        ])->layout('layouts.index');
    }
}