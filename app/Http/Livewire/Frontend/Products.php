<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Product;
use App\Models\Categorie;
use Livewire\Component;
use Livewire\Type;
use Livewire\WithPagination;
 
class Products extends Component
{
    use WithPagination;
    public $currentUrl;
    public $type;
    protected $listener = ['filter'];

    public function mount()
    {
        $this->currentUrl = request()->getPathInfo();
    }
    
    public function filter (Type $type)
    {
        $this->type = $type;
        $this->emit('filter');
    }
    
    public function render()
    {
        
        
        return view('livewire.frontend.products',[
            'products'=> Product::with('image')->orderByDesc('id')->paginate(10),
            'categories'=> Categorie::all()
            ])->layout('layouts.index');
    }
}