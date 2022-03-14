<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Categorie;
use App\Models\Type;
use Livewire\WithPagination;

class SideCategorie extends Component
{
    
    use WithPagination;
    public $currentUrl;
    
    public function findByType ($data)
    {
        $this->emit('sort', $data);
    }   

    public function mount()
    {
        $this->currentUrl = request()->getPathInfo();
    }
    

    public function render()
    {
        return view('livewire.component.side-categorie',[
            'categories' => Categorie::orderBy('name', 'asc')->get(),
            'types' => Type::where('name','NOT LIKE','%pipe%')->get()
        ])->layout('layouts.index');
    } 
    
}