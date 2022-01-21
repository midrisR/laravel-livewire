<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class InputSearch extends Component
{
    use WithPagination;
    public $query, $products;

    
    public function search ()
    {
        return redirect()->to('products/search?q='.$this->query.' ');
    }
}