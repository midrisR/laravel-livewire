<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Image;
use App\Models\Categorie;
use App\Models\Type;
use Ramsey\Uuid\Uuid;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search;
    public $image = [];

    public $isOpen =false;
    public $delete;
    public $update=false;
    
    protected $listeners = ['product-created' => '$refresh' , 'search'];
    
    public function render()
    {
            $prod = DB::table('Products')
            ->leftJoin('types', 'products.type', '=', 'types.id')
            ->select('products.*', 'types.name as type_name')
            ->where('products.name', 'like', '%'.$this->search.'%')
            ->orderByDesc('created_at')
            ->paginate(5);
            
        return view('livewire.backend.product.products',[
            'products' => $prod,
            'categories' => Categorie::all(),
            'types' => Type::all()
        ])->layout('layouts.dashboard');
    }

    public function goTo (){
     return redirect()->to('/dashboard/create-product/');
    }
}