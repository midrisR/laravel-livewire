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
    public $query ;

    protected $queryString = ['query'];
    protected $listener = ['filter'];

    public function mount()
    {
        $this->currentUrl = request()->getPathInfo();
     
    }

    public function render()
    {
   
        return view('livewire.frontend.products',[
            'products'=>Product::where('name', 'like', '%'.$this->query.'%')->with('image')->orderByDesc('id')->paginate(20),
            'categories'=> Categorie::all()
            ])->layout('layouts.index');
    }
}