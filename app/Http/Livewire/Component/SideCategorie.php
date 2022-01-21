<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Categorie;
use App\Models\Type;
use Livewire\WithPagination;

class SideCategorie extends Component
{
    
    use WithPagination;
    public $page = 1;
    public $currentUrl;
    public $message;

    
    public function mount()
    {
        $this->currentUrl = request()->getPathInfo();
    }
    
    
    public function render()
    {
        $filter  = Type::where('name','LIKE','%pipe%')->get();
        $sagment = request()->segment(2);
        return view('livewire.component.side-categorie',[
            'categories' => Categorie::all(),
            'types' =>  $sagment === "Pipa" ? $filter : Type::all()
        ])->layout('layouts.index');
    }
    
    
}