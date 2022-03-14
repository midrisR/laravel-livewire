<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Search extends Component
{
    
    use WithPagination;
    public $q;
    public $type;
    
    protected $listeners = ['sort' => 'filter'];
    protected $queryString = [
        'q' => ['except' => '', 'as' => 'q'],
        'type' => ['except' => '', 'as' => 'type'],
        'page' => ['except' => 1, 'as' => 'p'],
    ]; 

    public function filter ($query)
    {
        $this->type = $query;
    }
    
    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->q.'%')
        ->where('name', 'like', '%'.$this->type.'%')
        ->paginate(20);
        return view('livewire.frontend.search',[
            'products' => $products
        ])->layout('layouts.index');
    }
}