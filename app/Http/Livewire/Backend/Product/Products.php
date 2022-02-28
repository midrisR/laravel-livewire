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
    public $product,$confirmDetele ;

    protected $listeners = ['product-created' => '$refresh' , 'search'];

    function edit ($id) 
    {
        return redirect()->to('dashboard/product/'.$id.'');
    }

    public function view ($id)
    {
        return view('livewire.backend.product.product-edit',['product' => Product::find($id)]);
    }

    public function confirmDelete ($id)
    {
        $this->confirmDetele = $id;
    }

    public function destroy( Product $product) 
    {
        $product->delete();
        Storage::deleteDirectory('/photos/products/'. $product->id);
        $this->confirmDetele = false;
        session()->flash('message', 'Item Deleted Successfully');
    }


    public function render()
    {
            $prod = DB::table('products')
            ->leftJoin('types', 'products.type_id', '=', 'types.id')
            ->select('products.*', 'types.name as type_name')
            ->where('products.name', 'like', '%'.$this->search.'%')
            ->orderByDesc('id')
            ->paginate(5);

        return view('livewire.backend.product.products',[
            'products'   => $prod,
            'categories' => Categorie::all(),
            'types' => Type::all()
        ])->layout('layouts.dashboard');
    }
}