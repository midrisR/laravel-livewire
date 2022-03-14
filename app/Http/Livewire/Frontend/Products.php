<?php

namespace App\Http\Livewire\Frontend;
use App\Models\Product;
use App\Models\Categorie;
use Livewire\Component;
use Livewire\WithPagination;
 
class Products extends Component
{
    use WithPagination;
    public $type = '';
    public $page = 1;
    public $currentUrl;
    
    protected $listeners = ['sort' => 'filter'];
    protected $queryString = [
        'type' => ['except' => '', 'as' => 's'],
        'page' => ['except' => 1, 'as' => 'p'],
    ]; 
    
    
    public function mount()
    {
        $this->currentUrl = request()->getPathInfo();
    }
    
    
    public function filter ($query)
    {
        $this->type = $query;
    }
    
    
    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->type.'%' )
        ->with('image')
        ->orderByDesc('id')
        ->paginate(20);
        
        return view('livewire.frontend.products',[
            'products'=>$products,
            'categories'=> Categorie::all()
            ])->layout('layouts.index');
    }
}