<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;

class ProductDetail extends Component
{
    public $product;

    public function mount ($id)
    {
        $this->product = Product::find($id);
    }

    public function render()
    {
        return view('livewire.frontend.product-detail')->layout('layouts.index');
    }
}