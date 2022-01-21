<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Categorie;
use App\Models\Type;
use App\Models\Product;
use Ramsey\Uuid\Uuid;
use App\Models\Image;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $name, $status, $type_id,$brand_id, $categorie_id, $description, $meta_description, $meta_keywords;
    public $image = [];
    
    protected $listeners = ['product-created' => '$refresh'];
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'status' => 'required',
            'type_id' => 'required',
            'brand_id' => 'required',
            'categorie_id'=> 'required',
            'description'=> 'required',
            'meta_description'=> 'required',
            'meta_keywords'=> 'required',
            'image.*'=> 'image|max:1024',
            'image'=> 'required',
        ]);
       $data = Product::create([
            'name' => $this->name,
            'status' => $this->status,
            'code' =>  Uuid::uuid4(),
            'type_id' =>  $this->type_id,
            'brand_id' =>  $this->brand_id,
            'categorie_id'=> $this->categorie_id,
            'description'=> $this->description,
            'meta_description'=> $this->meta_description,
            'meta_keywords'=> $this->meta_keywords,
        ]);
        
        foreach ($this->image as $photo) {
            $ImageName =  md5( $photo . microtime()).'.'. $photo->extension();
            Image::create([
                'name'=> $ImageName,
                'product_id' => $data->id
            ]);
            
            $photo->storeAs('photos/products/'. $data->id ,$ImageName );
        }

        $this->reset();
        session()->flash('message', 'Product successfully created.');
        $this->dispatchBrowserEvent('product-created', ['description' => null]);
    }

    public function render()
    {
        return view('livewire.backend.product.create-product',[
            'categories' => Categorie::all(),
            'types' => Type::all(),
            'brands' => Brand::all()
        ])->layout('layouts.dashboard');;
    }
}