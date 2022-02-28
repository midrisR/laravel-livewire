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

 
    protected $listener= ['urlChanged'];
    
    public function mount()
    { 
        $this->currentUrl = request()->getPathInfo();
    }
   
    public function updating($name, $value)
    {
      
        $this->emit('urlChanged', http_build_query([$name => $value]));
    }
    
    public function render()
    {
        return view('livewire.component.side-categorie',[
            'categories' => Categorie::all(),
            'types' => Type::where('name','NOT LIKE','%pipe%')->get()
        ])->layout('layouts.index');
    }
    
    
}