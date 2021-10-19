<?php

namespace App\Http\Livewire\Backend\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Categorie;
use App\Models\Type;
use App\Models\Product;
use Ramsey\Uuid\Uuid;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;
    public $name, $status, $type, $CategoryId, $description, $meta_description, $meta_keywords, $imagePreview, $pId;
    public $image = [];
    public $product;
    
    protected $listeners = ['product-edited' => '$refresh'];

    public function mount ($id)
    {
        $product =  Product::find($id)->image;
        // $this->name = $product->name;
        // $this->status = $product->status;
        // $this->type = $product->type;
        // $this->CategoryId = $product->CategoryId;
        // $this->description = $product->description;
        // $this->meta_description = $product->meta_description;
        // $this->meta_keywords = $product->meta_keywords;
        // $this->pId =$id;
        dd($product);
    }

    public function edit()
    {
        $this->validate([
            'name' => 'required',
            'status' => 'required',
            'type' => 'required',
            'CategoryId'=> 'required',
            'description'=> 'required',
            'meta_description'=> 'required',
            'meta_keywords'=> 'required',
            'image.*'=> 'image|max:1024',
            'image'=> 'required',
        ]);
   
        Product::where('id', $this->pId)
        ->update([
            'name' => $this->name,
            'status' => $this->status,
            'type' => $this->type,
            'CategoryId'=> $this->CategoryId,
            'description'=> $this->description,
            'meta_descriptions'=> $this->meta_descriptions,
            'meta_keywords'=> $this->meta_keywords,
        ]);
        if($this->image){
            foreach($this->image as $img) {
                $ImageName = md5($img . microtime()).'.'.$img->extension();
                Image::create([
                    'name'=> $ImageName,
                    'product_id' => $this->cid
                ]);
                $img->storeAs("photos/products/$this->cid/", $ImageName);
            }         
        }
        session()->flash('message', 'Product successfully Updated.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.backend.product.edit-product',[
            'categories' => Categorie::all(),
            'types' => Type::all()
        ]) ->layout('layouts.dashboard');
    }
}