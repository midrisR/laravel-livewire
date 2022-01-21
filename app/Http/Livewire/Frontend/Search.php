<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Search extends Component
{
    
    use WithPagination;
    public $q;
    protected $queryString = ['q'];

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->q.'%')->paginate(10);
        return view('livewire.frontend.search',[
            'products' => $products
        ])->layout('layouts.index');
    }
}